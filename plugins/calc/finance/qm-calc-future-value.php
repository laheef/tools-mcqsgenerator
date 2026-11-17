<?php

/**
 * Future value
 * /finance/future-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Future value',
    'meta' => ['title' => 'Future value Calculator — Formula & Results', 'description' => 'Future value takes present value (starting amount) and returns total interest. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Future value Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'present_value',
                            'label' => 'Present value (starting amount)',
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
                            'name' => 'no_periods',
                            'label' => 'Number of periods',
                            'type' => 'number',
                            'help' => 'For example, months or years.',
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
                            'help' => 'Interest rate per period.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'include_deposits',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include periodic deposits/withdrawals' => '1', '' => '0'],
                            'dataset' => 'include deposits',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'deposit_amount',
                            'label' => 'Deposit amount per period',
                            'type' => 'result',
                            'help' => 'Enter negative number for withdrawals.',
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
                            'name' => 'deposit_time',
                            'label' => 'The deposits are made at the',
                            'type' => 'select',
                            'options' => ['beginning of the period' => '0', 'end of the period' => '1'],
                            'dataset' => 'deposit time',
                            'default' => 'beginning of the period',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'The total amount of the periodic&nbsp;'],
                                ['when' => 'periodic_deposits >= 0', 'text' => 'deposits is {{periodic_deposits.monetaryValue}}.'],
                                ['when' => 'periodic_deposits < 0', 'text' => 'withdrawals deposits is {{periodic_withdrawals.monetaryValue}}.'],
                                ['when' => null, 'text' => 'When the interest rate is taken into account, the present value of the starting amount&nbsp;'],
                                ['when' => 'periodic_deposits >= 0', 'text' => 'plus the deposits&nbsp;'],
                                ['when' => 'periodic_deposits < 0', 'text' => 'minus the withdrawals&nbsp;'],
                                ['when' => null, 'text' => 'is {{present_value_from_future.monetaryValue}}.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Future value and interest',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'future_value',
                            'label' => 'Future value',
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
                            'name' => 'total_interest',
                            'label' => 'Total interest',
                            'type' => 'number',
                            'help' => 'The future value minus present value and periodic deposits.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0, 0],
                    'fields' => [
                        [
                            'name' => 'show_table',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show schedule' => '1', '' => '0'],
                            'dataset' => 'show table',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'show_pie_chart',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show final amount breakdown' => '1', '' => '0'],
                            'dataset' => 'show pie',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'show_bar_chart',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show amount by period' => '1', '' => '0'],
                            'dataset' => 'show bar',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'deposit_amount >= 0', 'text' => 'The table includes periodic deposits of {{deposit_amount.monetaryValue}}.'],
                                ['when' => 'deposit_amount < 0', 'text' => 'The table includes periodic withdrawals of {{withdrawal_amount.monetaryValue}}.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The charts are not available for the calculations with periodic withdrawals.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'To see the table and charts, you need to calculate the future value above by entering necessary data.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'https://uploads-cdn.omnicalculator.com/images/future-value/future-value-calculator-screenshot.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'https://uploads-cdn.omnicalculator.com/images/future-value/future-value-calculator2.jpg'],
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
                            'name' => 'withdrawal_amount',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'periodic_deposits',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'total_interest_rounded',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'deposits_perc',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_perc',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'present_perc',
                            'label' => '',
                            'type' => 'presentation',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'present_value_from_future',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'periodic_withdrawals',
                            'label' => '',
                            'type' => 'presentation',
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
            'title' => 'future_value = getFutureValue(present_value, interest_rate, no_periods, deposit_amount, deposit_time)',
            'results' => ['future_value' => 'getFutureValue(present_value, interest_rate, no_periods, deposit_amount, deposit_time)'],
        ],
        [
            'title' => 'total_interest = one_way(future_value - present_value - deposit_amount*no_periods)',
            'results' => ['total_interest' => '(-deposit_amount*no_periods - present_value + getFutureValue(present_value, interest_rate, no_periods, deposit_amount, deposit_time))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getFutureValue",function(present_value,interest_rate,no_periods,deposit_amount,deposit_time){var future_value=present_value;for(var i=0;i<no_periods;i++){if(deposit_time==0){future_value+=deposit_amount}future_value+=future_value*interest_rate;if(deposit_time==1){future_value+=deposit_amount}if(i>500){break}}return future_value});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Present value (starting amount), Number of periods and Interest rate into Future value and the answer comes back as Deposit amount per period. There is no hidden constant here: change deposit amount per period and present value (starting amount) moves with it. The main result, Deposit amount per period, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Future value calculator works', 'html' => <<<'TXT'
            <p>The Future value calculator applies one relationship to 6 numbers and reports Deposit amount per period.</p><p>The relationship it solves reads Future value = getFutureValue(Present value (starting amount), Interest rate, Number of periods, Deposit amount per period, The deposits are made at the).</p><p>What comes back is Deposit amount per period — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>Present value (starting amount)</strong> — in USD</li><li><strong>Number of periods</strong> — a plain number, no unit. For example, months or years.</li><li><strong>Interest rate</strong> — in percent. Interest rate per period.</li><li><strong>The deposits are made at the</strong> — a plain number, no unit</li><li><strong>Future value</strong> — in USD</li><li><strong>Total interest</strong> — in USD. The future value minus present value and periodic deposits.</li></ul><p>The result box is Deposit amount per period in USD. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Interest rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Future value</strong> = <code>getFutureValue(Present value (starting amount), Interest rate, Number of periods, Deposit amount per period, The deposits are made at the)</code></li><li><strong>Total interest</strong> = <code>( − Deposit amount per period × Number of periods − Present value (starting amount) + getFutureValue(Present value (starting amount), Interest rate, Number of periods, Deposit amount per period, The deposits are made at the))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Future value</strong> = <code>getFutureValue(Present value (starting amount), Interest rate, Number of periods, Deposit amount per period, The deposits are made at the)</code> — the form to use when Present value (starting amount), Interest rate, Number of periods and Deposit amount per period are the values you have.</li><li><strong>Total interest</strong> = <code>( − Deposit amount per period × Number of periods − Present value (starting amount) + getFutureValue(Present value (starting amount), Interest rate, Number of periods, Deposit amount per period, The deposits are made at the))</code> — the form to use when Deposit amount per period, Number of periods, Present value (starting amount) and Interest rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Future value and Total interest can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Deposit amount per period is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Present value (starting amount) left as a guess.</strong> Anything typed into Present value (starting amount) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of periods left as a guess.</strong> Anything typed into Number of periods is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Present value (starting amount) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Present value (starting amount)</strong> takes a plain number with no unit attached. The page reads it when it works out Future value and Total interest. Have it to hand before you start: Present value (starting amount) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of periods</strong> takes a plain number with no unit attached. For example, months or years. The page reads it when it works out Future value and Total interest. Have it to hand before you start: Number of periods is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Interest rate per period. The page reads it when it works out Future value and Total interest. Have it to hand before you start: Interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>The deposits are made at the</strong> takes a plain number with no unit attached. The page reads it when it works out Future value and Total interest. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: The deposits are made at the is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Future value</strong> takes a plain number with no unit attached. Have it to hand before you start: Future value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total interest</strong> takes a plain number with no unit attached. The future value minus present value and periodic deposits. Have it to hand before you start: Total interest is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Deposit amount per period</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Present value (starting amount), Number of periods, Interest rate and The deposits are made at the. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Present value (starting amount) into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Deposit amount per period in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Deposit amount per period is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Present value (starting amount), Number of periods and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Present value (starting amount), Number of periods and Interest rate and the number you are missing is Deposit amount per period.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/national-insurance-uk">National insurance UK</a>, <a href="/finance/natural-rate-of-unemployment">Natural rate of unemployment Calculator</a> and <a href="/finance/nav">Net asset value (NAV)</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Future value calculator work out?', 'a' => <<<'TXT'
            Deposit amount per period, from Present value (starting amount), Interest rate, Number of periods and Deposit amount per period. The relationship is Future value = getFutureValue(Present value (starting amount), Interest rate, Number of periods, Deposit amount per period, The deposits are made at the).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Present value (starting amount) (USD), Number of periods, Interest rate (percent), The deposits are made at the, Future value (USD). Enter present value (starting amount), number of periods and interest rate; Deposit amount per period is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Future value and Total interest can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Deposit amount per period is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Present value (starting amount) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Deposit amount per period at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/national-insurance-uk', 'name' => 'National insurance UK'],
            ['path' => '/finance/natural-rate-of-unemployment', 'name' => 'Natural rate of unemployment Calculator'],
            ['path' => '/finance/nav', 'name' => 'Net asset value (NAV)'],
        ],
        'authors' => [],
    ],
];
