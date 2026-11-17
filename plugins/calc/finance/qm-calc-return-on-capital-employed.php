<?php

/**
 * Return on capital employed
 * /finance/return-on-capital-employed
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Return on capital employed',
    'meta' => ['title' => 'Return on capital employed — Free Online Calculator', 'description' => 'Return on capital employed turns ROCE method and EBIT into capital employed. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Return on capital employed Calculator', 'updated' => '2026-09-15'],
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
                            'label' => 'ROCE method',
                            'type' => 'select',
                            'options' => ['Calculate ROCE using total assets' => '0', 'Calculate ROCE using equity' => '1'],
                            'dataset' => 'method',
                            'default' => 'Calculate ROCE using total assets',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'From the income statement',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ebit',
                            'label' => 'EBIT',
                            'type' => 'number',
                            'help' => 'Earnings Before Interests and Taxes',
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
            'title' => 'From the balance sheet',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_assets',
                            'label' => 'Total assets',
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
                            'name' => 'total_current_liabilities',
                            'label' => 'Total current liabilities',
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
                            'name' => 'non_current_liabilities',
                            'label' => 'Non-current liabilities',
                            'type' => 'number',
                            'help' => 'Overall company\'s obligations that are due after the next 12 months. This section includes long term debts and long term leases, for example',
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
                            'name' => 'equity',
                            'label' => 'Equity',
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
            'title' => 'ROCE',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'capital_employed_1',
                            'label' => 'Capital employed',
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
                            'name' => 'roce_1',
                            'label' => 'Return on capital employed',
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
                            'name' => 'capital_employed_2',
                            'label' => 'Capital employed',
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
                            'name' => 'roce_2',
                            'label' => 'Return on capital employed',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(method == 0 and roce_1 >= 0.15 and roce_1 < 10) or (method == 1 and roce_2 >= 0.15 and roce_2 < 10)', 'text' => ' That\'s a great return on capital employed. We recommend you check it\'s free cash flow.&nbsp;'],
                                ['when' => '(method == 0 and roce_1 >= 0.02 and roce_1 < 0.15) or (method == 1 and roce_2 >= 0.02 and roce_2 < 0.15)', 'text' => ' For such a return on capital employed, we recommend you verify the weighted average cost of capital (WACC).&nbsp;'],
                                ['when' => '(method == 0 and roce_1 < 0.02 and roce_1 > 0) or (method == 1 and roce_2 < 0.02 and roce_2 > 0)', 'text' => ' That\'s a very low return on capital employed. Better check other companies to invest in.&nbsp;'],
                                ['when' => 'method == 1 and equity + non_current_liabilities <=0', 'text' => ' Such a capital structure is frightening. Please check another company.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'roce_1=ebit/(total_assets - total_current_liabilities)',
            'results' => ['total_assets' => 'ebit/roce_1 + total_current_liabilities', 'ebit' => 'roce_1*(total_assets - total_current_liabilities)', 'roce_1' => 'ebit/(total_assets - total_current_liabilities)', 'total_current_liabilities' => '-ebit/roce_1 + total_assets'],
        ],
        [
            'title' => 'roce_2 = ebit/(equity+ non_current_liabilities)',
            'results' => ['non_current_liabilities' => 'ebit/roce_2 - equity', 'ebit' => 'roce_2*(equity + non_current_liabilities)', 'equity' => 'ebit/roce_2 - non_current_liabilities', 'roce_2' => 'ebit/(equity + non_current_liabilities)'],
        ],
        [
            'title' => 'capital_employed_1=(total_assets - total_current_liabilities)',
            'results' => ['total_assets' => 'capital_employed_1 + total_current_liabilities', 'capital_employed_1' => 'total_assets - total_current_liabilities', 'total_current_liabilities' => '-capital_employed_1 + total_assets'],
        ],
        [
            'title' => 'capital_employed_2=(equity+ non_current_liabilities)',
            'results' => ['non_current_liabilities' => 'capital_employed_2 - equity', 'equity' => 'capital_employed_2 - non_current_liabilities', 'capital_employed_2' => 'equity + non_current_liabilities'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter EBIT, Total assets and Total current liabilities into Return on capital employed and the answer comes back as Non-current liabilities and Equity. There is no hidden constant here: change non-current liabilities and EBIT moves with it. The main result, Non-current liabilities, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Return on capital employed calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Return on capital employed: it takes 3 numbers and reports Non-current liabilities, Equity and Capital employed.</p><p>The relationship it solves reads Return on capital employed = EBIT ÷ (Total assets − Total current liabilities).</p><p>The answers are Non-current liabilities, Equity, Capital employed and Return on capital employed; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>EBIT</strong> — in USD. Earnings Before Interests and Taxes</li><li><strong>Total assets</strong> — in USD</li><li><strong>Total current liabilities</strong> — in USD</li></ul><p>The answers come back as Non-current liabilities in USD, Equity in USD, Capital employed in USD, Return on capital employed in percent, Capital employed in USD, Return on capital employed in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Return on capital employed lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Return on capital employed</strong> = <code>EBIT ÷ (Total assets − Total current liabilities)</code></li><li><strong>Total assets</strong> = <code>EBIT ÷ Return on capital employed + Total current liabilities</code></li><li><strong>EBIT</strong> = <code>Return on capital employed × (Total assets − Total current liabilities)</code></li><li><strong>Total current liabilities</strong> = <code>− EBIT ÷ Return on capital employed + Total assets</code></li><li><strong>Non-current liabilities</strong> = <code>EBIT ÷ Return on capital employed − Equity</code></li><li><strong>Equity</strong> = <code>EBIT ÷ Return on capital employed − Non-current liabilities</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Return on capital employed</strong> = <code>EBIT ÷ (Total assets − Total current liabilities)</code> — the form to use when EBIT, Total assets and Total current liabilities are the values you have.</li><li><strong>Total assets</strong> = <code>EBIT ÷ Return on capital employed + Total current liabilities</code> — the form to use when EBIT, Return on capital employed and Total current liabilities are the values you have.</li><li><strong>EBIT</strong> = <code>Return on capital employed × (Total assets − Total current liabilities)</code> — the form to use when Return on capital employed, Total assets and Total current liabilities are the values you have.</li><li><strong>Total current liabilities</strong> = <code>− EBIT ÷ Return on capital employed + Total assets</code> — the form to use when EBIT, Return on capital employed and Total assets are the values you have.</li><li><strong>Return on capital employed</strong> = <code>EBIT ÷ (Equity + Non-current liabilities)</code> — the form to use when EBIT, Equity and Non-current liabilities are the values you have.</li><li><strong>Non-current liabilities</strong> = <code>EBIT ÷ Return on capital employed − Equity</code> — the form to use when EBIT, Return on capital employed and Equity are the values you have.</li><li><strong>EBIT</strong> = <code>Return on capital employed × (Equity + Non-current liabilities)</code> — the form to use when Return on capital employed, Equity and Non-current liabilities are the values you have.</li><li><strong>Equity</strong> = <code>EBIT ÷ Return on capital employed − Non-current liabilities</code> — the form to use when EBIT, Return on capital employed and Non-current liabilities are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Return on capital employed, Total assets and EBIT can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Non-current liabilities, Equity and Capital employed are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>EBIT left as a guess.</strong> Anything typed into EBIT is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total assets left as a guess.</strong> Anything typed into Total assets is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total current liabilities left as a guess.</strong> Anything typed into Total current liabilities is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in EBIT and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>EBIT</strong> takes a plain number with no unit attached. Earnings Before Interests and Taxes. The page reads it when it works out Total assets, Return on capital employed and Total current liabilities. Have it to hand before you start: EBIT is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total assets</strong> takes a plain number with no unit attached. The page reads it when it works out EBIT, Return on capital employed and Total current liabilities. Have it to hand before you start: Total assets is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total current liabilities</strong> takes a plain number with no unit attached. The page reads it when it works out Total assets, EBIT and Return on capital employed. Have it to hand before you start: Total current liabilities is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Non-current liabilities</strong> is a plain number. The value follows from EBIT, Return on capital employed and Equity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Equity</strong> is a plain number. The value follows from EBIT, Return on capital employed and Non-current liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Capital employed</strong> is a plain number. The value follows from Total assets and Total current liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Return on capital employed</strong> is a percent figure. The value follows from EBIT, Total assets and Total current liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Capital employed</strong> is a plain number. The value follows from Equity and Non-current liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Return on capital employed</strong> is a percent figure. The value follows from EBIT, Equity and Non-current liabilities. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Non-current liabilities is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes EBIT, Total assets and Total current liabilities are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: EBIT, Total assets and Total current liabilities measured, Non-current liabilities and Equity wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/dti">Debt to income ratio</a>, <a href="/finance/debt-to-capital">Debt-to-capital ratio Calculator</a> and <a href="/finance/defensive-interval-ratio">Defensive interval ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Return on capital employed calculator work out?', 'a' => <<<'TXT'
            Non-current liabilities, Equity, Capital employed and Return on capital employed, from EBIT, Total assets and Total current liabilities. The relationship is Return on capital employed = EBIT ÷ (Total assets − Total current liabilities).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            EBIT (USD), Total assets (USD), Total current liabilities (USD). Fill EBIT, total assets and total current liabilities and leave Non-current liabilities empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Return on capital employed, Total assets, EBIT and Total current liabilities can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Non-current liabilities is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With EBIT left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Non-current liabilities keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/dti', 'name' => 'Debt to income ratio'],
            ['path' => '/finance/debt-to-capital', 'name' => 'Debt-to-capital ratio Calculator'],
            ['path' => '/finance/defensive-interval-ratio', 'name' => 'Defensive interval ratio Calculator'],
        ],
        'authors' => [],
    ],
];
