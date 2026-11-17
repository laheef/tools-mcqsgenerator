<?php

/**
 * Income elasticity of demand
 * /finance/income-elasticity-demand
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Income elasticity of demand',
    'meta' => ['title' => 'Income elasticity of demand — Formula & Results', 'description' => 'Income elasticity of demand turns method, income in period 1 and income in period 2 into change in income and change in quantity. Every figure is computed.', 'h1' => 'Income elasticity of demand Calculator', 'updated' => '2026-07-23'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'method',
                            'label' => 'Method',
                            'type' => 'select',
                            'options' => ['Standard' => '1', 'Midpoint' => '0'],
                            'dataset' => 'method',
                            'help' => 'Here you can choose the way you want to compute the percentage change.',
                            'default' => 'Standard',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income_period_1',
                            'label' => 'Income in period 1',
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
                            'name' => 'income_period_2',
                            'label' => 'Income in period 2',
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
                            'name' => 'change_in_income',
                            'label' => 'Change in income',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Demand',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity_period_1',
                            'label' => 'Quantity demanded in period 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quantity_period_2',
                            'label' => 'Quantity demanded in period 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'change_in_quantity',
                            'label' => 'Change in quantity',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income_elasticity_of_demand',
                            'label' => 'Income elasticity of demand',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'income_elasticity_of_demand < 0', 'text' => 'It is an inferior good.&nbsp;'],
                                ['when' => 'income_elasticity_of_demand > 0 and income_elasticity_of_demand < 1', 'text' => 'It is an income-inelastic normal good.&nbsp;'],
                                ['when' => 'income_elasticity_of_demand > 1', 'text' => 'It is an income-elastic normal good.&nbsp;'],
                                ['when' => 'income_elasticity_of_demand == 1', 'text' => 'It is a unit elastic normal good.&nbsp;'],
                                ['when' => 'income_elasticity_of_demand == 0', 'text' => 'A change in income has no effect on the demanded quantity — it is a sticky good.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden group',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'method_value_1',
                            'label' => 'Ct1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'method_value_2',
                            'label' => 'Ct2',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'income_elasticity_of_demand = change_in_quantity / change_in_income',
            'results' => ['change_in_quantity' => 'change_in_income*income_elasticity_of_demand', 'change_in_income' => 'change_in_quantity/income_elasticity_of_demand', 'income_elasticity_of_demand' => 'change_in_quantity/change_in_income'],
        ],
        [
            'title' => <<<'TXT'
            change_in_quantity = ((quantity_period_2-quantity_period_1)/quantity_period_1) * method_value_1 + ((quantity_period_2-quantity_period_1)/((quantity_period_1+quantity_period_2)/2)) * method_value_2
            TXT,
            'results' => [
                'method_value_2' => <<<'TXT'
                (1/2)*(-change_in_quantity*pow(quantity_period_1, 2) - change_in_quantity*quantity_period_1*quantity_period_2 - method_value_1*pow(quantity_period_1, 2) + method_value_1*pow(quantity_period_2, 2))/(quantity_period_1*(quantity_period_1 - quantity_period_2))
                TXT,
                'quantity_period_1' => <<<'TXT'
                (1/2)*quantity_period_2*(-change_in_quantity + 2*method_value_2 + sqrt(pow(change_in_quantity, 2) + 4*change_in_quantity*method_value_1 - 4*change_in_quantity*method_value_2 + 4*pow(method_value_1, 2) + 8*method_value_1*method_value_2 + 4*pow(method_value_2, 2)))/(change_in_quantity + method_value_1 + 2*method_value_2)
                TXT,
                'method_value_1' => <<<'TXT'
                quantity_period_1*(-change_in_quantity*quantity_period_1 - change_in_quantity*quantity_period_2 - 2*method_value_2*quantity_period_1 + 2*method_value_2*quantity_period_2)/(pow(quantity_period_1, 2) - pow(quantity_period_2, 2))
                TXT,
                'change_in_quantity' => <<<'TXT'
                (-method_value_1*pow(quantity_period_1, 2) + method_value_1*pow(quantity_period_2, 2) - 2*method_value_2*pow(quantity_period_1, 2) + 2*method_value_2*quantity_period_1*quantity_period_2)/(quantity_period_1*(quantity_period_1 + quantity_period_2))
                TXT,
                'quantity_period_2' => <<<'TXT'
                (1/2)*quantity_period_1*(change_in_quantity - 2*method_value_2 + sqrt(pow(change_in_quantity, 2) + 4*change_in_quantity*method_value_1 - 4*change_in_quantity*method_value_2 + 4*pow(method_value_1, 2) + 8*method_value_1*method_value_2 + 4*pow(method_value_2, 2)))/method_value_1
                TXT,
            ],
        ],
        [
            'title' => <<<'TXT'
            change_in_income = (income_period_2-income_period_1)/income_period_1 * method_value_1 + ((income_period_2-income_period_1)/((income_period_1+income_period_2)/2)) * method_value_2
            TXT,
            'results' => [
                'method_value_2' => <<<'TXT'
                (1/2)*(-change_in_income*pow(income_period_1, 2) - change_in_income*income_period_1*income_period_2 - pow(income_period_1, 2)*method_value_1 + pow(income_period_2, 2)*method_value_1)/(income_period_1*(income_period_1 - income_period_2))
                TXT,
                'income_period_1' => <<<'TXT'
                (1/2)*income_period_2*(-change_in_income + 2*method_value_2 + sqrt(pow(change_in_income, 2) + 4*change_in_income*method_value_1 - 4*change_in_income*method_value_2 + 4*pow(method_value_1, 2) + 8*method_value_1*method_value_2 + 4*pow(method_value_2, 2)))/(change_in_income + method_value_1 + 2*method_value_2)
                TXT,
                'method_value_1' => <<<'TXT'
                income_period_1*(-change_in_income*income_period_1 - change_in_income*income_period_2 - 2*income_period_1*method_value_2 + 2*income_period_2*method_value_2)/(pow(income_period_1, 2) - pow(income_period_2, 2))
                TXT,
                'income_period_2' => <<<'TXT'
                (1/2)*income_period_1*(change_in_income - 2*method_value_2 + sqrt(pow(change_in_income, 2) + 4*change_in_income*method_value_1 - 4*change_in_income*method_value_2 + 4*pow(method_value_1, 2) + 8*method_value_1*method_value_2 + 4*pow(method_value_2, 2)))/method_value_1
                TXT,
                'change_in_income' => <<<'TXT'
                (-pow(income_period_1, 2)*method_value_1 - 2*pow(income_period_1, 2)*method_value_2 + 2*income_period_1*income_period_2*method_value_2 + pow(income_period_2, 2)*method_value_1)/(income_period_1*(income_period_1 + income_period_2))
                TXT,
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Change in income and Change in quantity into Income elasticity of demand and the answer comes back as Income in period 1 and Income in period 2. The arithmetic is the whole method: income in period 1 is worked out from change in income by one formula, applied once. Income in period 1 comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Income elasticity of demand calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Income elasticity of demand: it takes 2 numbers and reports Income in period 1, Income in period 2 and Quantity demanded in period 1.</p><p>Written with the labels from the form, Income elasticity of demand = Change in quantity ÷ Change in income.</p><p>The result panel carries Income in period 1, Income in period 2, Quantity demanded in period 1 and Quantity demanded in period 2, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Change in income</strong> — in percent</li><li><strong>Change in quantity</strong> — in percent</li></ul><p>The answers come back as Income in period 1 in USD, Income in period 2 in USD, Quantity demanded in period 1, Quantity demanded in period 2, Income elasticity of demand, Ct1, Ct2. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Change in income lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Income elasticity of demand</strong> = <code>Change in quantity ÷ Change in income</code></li><li><strong>Change in quantity</strong> = <code>Change in income × Income elasticity of demand</code></li><li><strong>Change in income</strong> = <code>Change in quantity ÷ Income elasticity of demand</code></li><li><strong>Quantity demanded in period 2</strong> = <code>(1 ÷ 2) × Quantity demanded in period 1 × (Change in quantity − 2 × Ct2 + √((Change in quantity)^(2) + 4 × Change in quantity × Ct1 − 4 × Change in quantity × Ct2 + 4 × (Ct1)^(2) + 8 × Ct1 × Ct2 + 4 × (Ct2)^(2))) ÷ Ct1</code></li><li><strong>Ct1</strong> = <code>Income in period 1 × ( − Change in income × Income in period 1 − Change in income × Income in period 2 − 2 × Income in period 1 × Ct2 + 2 × Income in period 2 × Ct2) ÷ ((Income in period 1)^(2) − (Income in period 2)^(2))</code></li><li><strong>Income in period 2</strong> = <code>(1 ÷ 2) × Income in period 1 × (Change in income − 2 × Ct2 + √((Change in income)^(2) + 4 × Change in income × Ct1 − 4 × Change in income × Ct2 + 4 × (Ct1)^(2) + 8 × Ct1 × Ct2 + 4 × (Ct2)^(2))) ÷ Ct1</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Income elasticity of demand</strong> = <code>Change in quantity ÷ Change in income</code> — the form to use when Change in quantity and Change in income are the values you have.</li><li><strong>Change in quantity</strong> = <code>Change in income × Income elasticity of demand</code> — the form to use when Change in income and Income elasticity of demand are the values you have.</li><li><strong>Change in income</strong> = <code>Change in quantity ÷ Income elasticity of demand</code> — the form to use when Change in quantity and Income elasticity of demand are the values you have.</li><li><strong>Quantity demanded in period 2</strong> = <code>(1 ÷ 2) × Quantity demanded in period 1 × (Change in quantity − 2 × Ct2 + √((Change in quantity)^(2) + 4 × Change in quantity × Ct1 − 4 × Change in quantity × Ct2 + 4 × (Ct1)^(2) + 8 × Ct1 × Ct2 + 4 × (Ct2)^(2))) ÷ Ct1</code> — the form to use when Quantity demanded in period 1, Change in quantity, Ct2 and Ct1 are the values you have.</li><li><strong>Change in income</strong> = <code>( − (Income in period 1)^(2) × Ct1 − 2 × (Income in period 1)^(2) × Ct2 + 2 × Income in period 1 × Income in period 2 × Ct2 + (Income in period 2)^(2) × Ct1) ÷ (Income in period 1 × (Income in period 1 + Income in period 2))</code> — the form to use when Income in period 1, Ct1, Ct2 and Income in period 2 are the values you have.</li><li><strong>Ct1</strong> = <code>Income in period 1 × ( − Change in income × Income in period 1 − Change in income × Income in period 2 − 2 × Income in period 1 × Ct2 + 2 × Income in period 2 × Ct2) ÷ ((Income in period 1)^(2) − (Income in period 2)^(2))</code> — the form to use when Income in period 1, Change in income, Income in period 2 and Ct2 are the values you have.</li><li><strong>Income in period 2</strong> = <code>(1 ÷ 2) × Income in period 1 × (Change in income − 2 × Ct2 + √((Change in income)^(2) + 4 × Change in income × Ct1 − 4 × Change in income × Ct2 + 4 × (Ct1)^(2) + 8 × Ct1 × Ct2 + 4 × (Ct2)^(2))) ÷ Ct1</code> — the form to use when Income in period 1, Change in income, Ct2 and Ct1 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Income elasticity of demand, Change in quantity and Change in income can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Change in income and Change in quantity carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Income in period 1, Income in period 2 and Quantity demanded in period 1 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Change in income left as a guess.</strong> Anything typed into Change in income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Change in quantity left as a guess.</strong> Anything typed into Change in quantity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Change in income to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Change in income</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Change in quantity, Income elasticity of demand and Ct2. Have it to hand before you start: Change in income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Change in quantity</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Change in income, Income elasticity of demand and Ct2. Have it to hand before you start: Change in quantity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Income in period 1</strong> is a plain number. The value follows from Income in period 2, Change in income, Ct2 and Ct1. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Income in period 2</strong> is a plain number. The value follows from Income in period 1, Change in income, Ct2 and Ct1. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Quantity demanded in period 1</strong> is a plain number. The value follows from Quantity demanded in period 2, Change in quantity, Ct2 and Ct1. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Quantity demanded in period 2</strong> is a plain number. The value follows from Quantity demanded in period 1, Change in quantity, Ct2 and Ct1. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Income elasticity of demand</strong> is a plain number. The value follows from Change in quantity and Change in income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Ct1</strong> is a plain number. The value follows from Quantity demanded in period 1, Change in quantity, Quantity demanded in period 2 and Ct2. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Ct2</strong> is a plain number. The value follows from Change in quantity, Quantity demanded in period 1, Quantity demanded in period 2 and Ct1. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Income in period 1 is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Change in income and Change in quantity are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Change in income and Change in quantity is what you already know and Income in period 1 and Income in period 2 is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/illinois-overtime">Illinois overtime Calculator</a>, <a href="/finance/illinois-tax">Illinois tax Calculator</a> and <a href="/finance/immediate-annuity">Immediate annuity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Income elasticity of demand calculator work out?', 'a' => <<<'TXT'
            Income in period 1, Income in period 2, Quantity demanded in period 1 and Quantity demanded in period 2, from Change in quantity and Change in income. The relationship is Income elasticity of demand = Change in quantity ÷ Change in income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Change in income (percent), Change in quantity (percent). With change in income and change in quantity in place, Income in period 1 can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Income elasticity of demand, Change in quantity, Change in income and Ct2 can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Income in period 1 is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Change in income left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Income in period 1 keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/illinois-overtime', 'name' => 'Illinois overtime Calculator'],
            ['path' => '/finance/illinois-tax', 'name' => 'Illinois tax Calculator'],
            ['path' => '/finance/immediate-annuity', 'name' => 'Immediate annuity Calculator'],
        ],
        'authors' => [],
    ],
];
