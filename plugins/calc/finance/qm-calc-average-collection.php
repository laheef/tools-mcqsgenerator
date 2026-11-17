<?php

/**
 * Average collection period
 * /finance/average-collection
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Average collection period',
    'meta' => ['title' => 'Average collection period — Formula & Results', 'description' => 'Average collection period turns calculation method, duration and beginning accounts receivable into average accounts receivable and receivables turnover ratio.', 'h1' => 'Average collection period Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'formula',
                            'label' => 'Calculation method',
                            'type' => 'select',
                            'options' => ['Average accounts receivable' => '1', 'Receivables turnover ratio' => '0'],
                            'dataset' => 'calculation_method',
                            'defaults' => [
                                ['value' => 'Average accounts receivable', 'when' => null],
                                ['value' => 'Average accounts receivable', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numberOfDays',
                            'label' => 'Duration',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '365',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Calculate average accounts receivable',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beginningAccountsReceivable',
                            'label' => 'Beginning accounts receivable',
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
                            'name' => 'endingAccountsReceivable',
                            'label' => 'Ending accounts receivable',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'accountsReceivable',
                            'label' => 'Average accounts receivable',
                            'type' => 'number',
                            'help' => 'Money that customers owe you for your sales or services.',
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
                            'name' => 'totalNetCreditSales',
                            'label' => 'Total credit sales',
                            'type' => 'number',
                            'help' => 'Net credit sales made in the same duration.',
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
                            'name' => 'turnoverRatio',
                            'label' => 'Receivables turnover ratio',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'creditTerm',
                            'label' => 'Terms of credit',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
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
                    'place' => [0, 0],
                    'fields' => [
                        [
                            'name' => 'averageCollectionPeriod',
                            'label' => 'Average collection period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.001'],
                        ],
                        [
                            'name' => 'averageCollectionPeriod2',
                            'label' => 'Average collection period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0],
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'averageCollectionPeriod < creditTerm', 'text' => 'Perfect! Your average collection period is shorter than your terms of credit.&nbsp;'],
                                ['when' => 'averageCollectionPeriod == creditTerm', 'text' => 'Great! Your average collection period aligns perfectly with your terms of credit.&nbsp;'],
                                ['when' => 'averageCollectionPeriod > creditTerm and averageCollectionPeriod <= margin', 'text' => 'Your average collection period is within an acceptable margin of your terms of credit.&nbsp;'],
                                ['when' => 'averageCollectionPeriod > creditTerm and averageCollectionPeriod > margin', 'text' => 'Careful! Your average collection period is too long compared to your terms of credit.'],
                            ],
                        ],
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'averageCollectionPeriod2 < creditTerm', 'text' => 'Perfect! Your average collection period is shorter than your terms of credit.&nbsp;'],
                                ['when' => 'averageCollectionPeriod2 == creditTerm', 'text' => 'Great! Your average collection period aligns perfectly with your terms of credit.&nbsp;'],
                                ['when' => 'averageCollectionPeriod2 > creditTerm and averageCollectionPeriod2 <= margin', 'text' => 'Your average collection period is within an acceptable margin of your terms of credit.&nbsp;'],
                                ['when' => 'averageCollectionPeriod2 > creditTerm and averageCollectionPeriod2 > margin', 'text' => 'Careful! Your average collection period is too long compared to your terms of credit.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'margin',
                            'label' => 'Margin',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'averageCollectionPeriod = ( accountsReceivable * numberOfDays ) / totalNetCreditSales',
            'results' => ['averageCollectionPeriod' => 'accountsReceivable*numberOfDays/totalNetCreditSales', 'numberOfDays' => 'averageCollectionPeriod*totalNetCreditSales/accountsReceivable', 'totalNetCreditSales' => 'accountsReceivable*numberOfDays/averageCollectionPeriod', 'accountsReceivable' => 'averageCollectionPeriod*totalNetCreditSales/numberOfDays'],
        ],
        [
            'title' => 'turnoverRatio = totalNetCreditSales / accountsReceivable',
            'results' => ['totalNetCreditSales' => 'accountsReceivable*turnoverRatio', 'turnoverRatio' => 'totalNetCreditSales/accountsReceivable', 'accountsReceivable' => 'totalNetCreditSales/turnoverRatio'],
        ],
        [
            'title' => 'averageCollectionPeriod2 = numberOfDays / turnoverRatio',
            'results' => ['numberOfDays' => 'averageCollectionPeriod2*turnoverRatio', 'averageCollectionPeriod2' => 'numberOfDays/turnoverRatio', 'turnoverRatio' => 'numberOfDays/averageCollectionPeriod2'],
        ],
        [
            'title' => 'accountsReceivable = (beginningAccountsReceivable + endingAccountsReceivable) / 2',
            'results' => ['endingAccountsReceivable' => '2*accountsReceivable - beginningAccountsReceivable', 'beginningAccountsReceivable' => '2*accountsReceivable - endingAccountsReceivable', 'accountsReceivable' => '(1/2)*beginningAccountsReceivable + (1/2)*endingAccountsReceivable'],
        ],
        [
            'title' => 'margin = creditTerm + creditTerm / 3',
            'results' => ['margin' => '(4/3)*creditTerm', 'creditTerm' => '(3/4)*margin'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Average collection period turns Duration, Average accounts receivable and Total credit sales into Beginning accounts receivable and Ending accounts receivable. Nothing is looked up on this page: beginning accounts receivable is computed from duration and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Beginning accounts receivable is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Average collection period calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Average collection period: it takes 3 numbers and reports Beginning accounts receivable, Ending accounts receivable and Receivables turnover ratio.</p><p>The relationship it solves reads Average collection period = Average accounts receivable × Duration ÷ Total credit sales.</p><p>What comes back is Beginning accounts receivable, Ending accounts receivable, Receivables turnover ratio and Terms of credit — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Duration</strong> — in days</li><li><strong>Average accounts receivable</strong> — in USD. Money that customers owe you for your sales or services.</li><li><strong>Total credit sales</strong> — in USD. Net credit sales made in the same duration.</li></ul><p>The result boxes are Beginning accounts receivable in USD, Ending accounts receivable in USD, Receivables turnover ratio, Terms of credit in days, Average collection period in days, Average collection period in days, Margin; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Terms of credit offers 6 units and opens on days, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Average collection period</strong> = <code>Average accounts receivable × Duration ÷ Total credit sales</code></li><li><strong>Duration</strong> = <code>Average collection period × Total credit sales ÷ Average accounts receivable</code></li><li><strong>Total credit sales</strong> = <code>Average accounts receivable × Duration ÷ Average collection period</code></li><li><strong>Average accounts receivable</strong> = <code>Average collection period × Total credit sales ÷ Duration</code></li><li><strong>Receivables turnover ratio</strong> = <code>Total credit sales ÷ Average accounts receivable</code></li><li><strong>Ending accounts receivable</strong> = <code>2 × Average accounts receivable − Beginning accounts receivable</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Average collection period</strong> = <code>Average accounts receivable × Duration ÷ Total credit sales</code> — the form to use when Average accounts receivable, Duration and Total credit sales are the values you have.</li><li><strong>Duration</strong> = <code>Average collection period × Total credit sales ÷ Average accounts receivable</code> — the form to use when Average collection period, Total credit sales and Average accounts receivable are the values you have.</li><li><strong>Total credit sales</strong> = <code>Average accounts receivable × Duration ÷ Average collection period</code> — the form to use when Average accounts receivable, Duration and Average collection period are the values you have.</li><li><strong>Average accounts receivable</strong> = <code>Average collection period × Total credit sales ÷ Duration</code> — the form to use when Average collection period, Total credit sales and Duration are the values you have.</li><li><strong>Receivables turnover ratio</strong> = <code>Total credit sales ÷ Average accounts receivable</code> — the form to use when Total credit sales and Average accounts receivable are the values you have.</li><li><strong>Total credit sales</strong> = <code>Average accounts receivable × Receivables turnover ratio</code> — the form to use when Average accounts receivable and Receivables turnover ratio are the values you have.</li><li><strong>Average accounts receivable</strong> = <code>Total credit sales ÷ Receivables turnover ratio</code> — the form to use when Total credit sales and Receivables turnover ratio are the values you have.</li><li><strong>Average collection period</strong> = <code>Duration ÷ Receivables turnover ratio</code> — the form to use when Duration and Receivables turnover ratio are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Average collection period, Duration and Total credit sales can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Duration is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Beginning accounts receivable, Ending accounts receivable and Receivables turnover ratio are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Duration left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Duration is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Average accounts receivable left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average accounts receivable is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Duration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Average collection period form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Duration</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. Change it and Average collection period, Total credit sales and Average accounts receivable changes with it. Fill it from a measurement rather than a memory — Duration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Average accounts receivable</strong> takes a plain number with no unit attached. Money that customers owe you for your sales or services. Change it and Average collection period, Duration and Total credit sales changes with it. Fill it from a measurement rather than a memory — Average accounts receivable is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total credit sales</strong> takes a plain number with no unit attached. Net credit sales made in the same duration. Change it and Average collection period, Duration and Average accounts receivable changes with it. Fill it from a measurement rather than a memory — Total credit sales is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Beginning accounts receivable</strong> is a plain number. It is worked out from Average accounts receivable and Ending accounts receivable. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Ending accounts receivable</strong> is a plain number. It is worked out from Average accounts receivable and Beginning accounts receivable. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Receivables turnover ratio</strong> is a plain number. It is worked out from Total credit sales and Average accounts receivable. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Terms of credit</strong> is a days figure. It is worked out from Margin. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Average collection period</strong> is a days figure. It is worked out from Average accounts receivable, Duration and Total credit sales. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Average collection period</strong> is a days figure. It is worked out from Duration and Receivables turnover ratio. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Margin</strong> is a plain number. It is worked out from Terms of credit. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Average collection period actually offers.</p><ul><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Beginning accounts receivable follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover days. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Duration, Average accounts receivable and Total credit sales measured, Beginning accounts receivable and Ending accounts receivable wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/operating-cash-flow">Operating cash flow</a>, <a href="/finance/operating-margin">Operating margin Calculator</a> and <a href="/finance/opportunity-cost">Opportunity cost Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Average collection period calculator work out?', 'a' => <<<'TXT'
            Beginning accounts receivable, Ending accounts receivable, Receivables turnover ratio and Terms of credit, from Average accounts receivable, Duration and Total credit sales. The relationship is Average collection period = Average accounts receivable × Duration ÷ Total credit sales.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Duration (days), Average accounts receivable (USD), Total credit sales (USD). Fill duration, average accounts receivable and total credit sales and leave Beginning accounts receivable empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Average collection period, Duration, Total credit sales and Average accounts receivable can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Beginning accounts receivable is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Duration blank and the page solves for it, reporting Beginning accounts receivable instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Beginning accounts receivable keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/operating-cash-flow', 'name' => 'Operating cash flow'],
            ['path' => '/finance/operating-margin', 'name' => 'Operating margin Calculator'],
            ['path' => '/finance/opportunity-cost', 'name' => 'Opportunity cost Calculator'],
        ],
        'authors' => [],
    ],
];
