<?php

/**
 * Degree of operating leverage
 * /finance/degree-of-operating-leverage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Degree of operating leverage',
    'meta' => ['title' => 'Degree of operating leverage — Formula & Results', 'description' => 'Degree of operating leverage reports change in sales and Change in EBIT. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Degree of operating leverage Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Period to period specific data',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year_one_sales',
                            'label' => 'Period one sales',
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
                            'name' => 'year_one_ebit',
                            'label' => 'Period one EBIT',
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
                            'name' => 'year_two_sales',
                            'label' => 'Period two sales',
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
                            'name' => 'year_two_ebit',
                            'label' => 'Period two EBIT',
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
                            'name' => 'change_in_sales',
                            'label' => 'Change in sales',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            If you have the percentual change (period to period) of sales, put it here. Otherwise, add the specific period data in the section "Period to period specific data" above.
                            TXT,
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
                            'name' => 'change_in_EBIT',
                            'label' => 'Change in EBIT',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            If you have the percentual change (period to period) of EBIT, put it here. Otherwise, add the specific period data in the section "Period to period specific data" above.
                            TXT,
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
                            'name' => 'degree_of_operating_leverage',
                            'label' => 'Degree of operating leverage',
                            'type' => 'number',
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
                                ['when' => 'change_in_sales < 0 and change_in_EBIT < 0', 'text' => 'Your company looks to be selling less and also producing less earnings. Better analyze its interest coverage ratio.&nbsp;'],
                                ['when' => 'change_in_sales > 0 and change_in_EBIT < 0', 'text' => 'Your company looks to be selling more, but suffering a reduction in its earnings. Better analyze its free cash flow.&nbsp;'],
                                ['when' => 'change_in_sales < 0 and change_in_EBIT > 0', 'text' => 'Your company looks to be selling less, but making more earnings. Better give a check to its inventory turnover ratio.&nbsp;'],
                                ['when' => 'change_in_sales > 0 and change_in_EBIT > 0', 'text' => 'Your company looks to be doing well. Sales and earnings are both growing. We recommend you to start checking how much you will profit from stocks.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'degree_of_operating_leverage = change_in_EBIT / change_in_sales',
            'results' => ['change_in_sales' => 'change_in_EBIT/degree_of_operating_leverage', 'change_in_EBIT' => 'change_in_sales*degree_of_operating_leverage', 'degree_of_operating_leverage' => 'change_in_EBIT/change_in_sales'],
        ],
        [
            'title' => 'change_in_EBIT = (year_two_ebit-year_one_ebit) / year_one_ebit',
            'results' => ['change_in_EBIT' => '(-year_one_ebit + year_two_ebit)/year_one_ebit', 'year_one_ebit' => 'year_two_ebit/(change_in_EBIT + 1)', 'year_two_ebit' => 'year_one_ebit*(change_in_EBIT + 1)'],
        ],
        [
            'title' => 'change_in_sales = (year_two_sales-year_one_sales) / year_one_sales',
            'results' => ['change_in_sales' => '(-year_one_sales + year_two_sales)/year_one_sales', 'year_two_sales' => 'year_one_sales*(change_in_sales + 1)', 'year_one_sales' => 'year_two_sales/(change_in_sales + 1)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Degree of operating leverage turns Change in sales and Change in EBIT into Period one sales and Period one EBIT. It is a single relationship that reads period one sales out of change in sales, not a table of canned results keyed by them. Units for Period one sales default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Degree of operating leverage calculator works', 'html' => <<<'TXT'
            <p>Degree of operating leverage answers one question from 2 numbers, and the answer is Period one sales, Period one EBIT and Period two sales.</p><p>The relationship it solves reads Degree of operating leverage = Change in EBIT ÷ Change in sales.</p><p>The result panel carries Period one sales, Period one EBIT, Period two sales and Period two EBIT, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Change in sales</strong> — in percent. If you have the percentual change (period to period) of sales, put it here. Otherwise, add the specific period data in the section &quot;Period to period specific data&quot; above.</li><li><strong>Change in EBIT</strong> — in percent. If you have the percentual change (period to period) of EBIT, put it here. Otherwise, add the specific period data in the section &quot;Period to period specific data&quot; above.</li></ul><p>The answers come back as Period one sales in USD, Period one EBIT in USD, Period two sales in USD, Period two EBIT in USD, Degree of operating leverage. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Period one sales = 10 USD, Period one EBIT = 100 USD, Period two sales = 1000 USD, Period two EBIT = 10 USD, Change in EBIT = 100 perc and Degree of operating leverage = 1000; the answers are <strong>Change in sales</strong> = 0.1 perc.</p><ul><li><strong>Change in sales</strong> = 0.1 perc</li></ul><p>That is <strong>Degree of operating leverage</strong> = <code>Change in EBIT ÷ Change in sales</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Change in sales</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Change in sales offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Degree of operating leverage</strong> = <code>Change in EBIT ÷ Change in sales</code></li><li><strong>Change in sales</strong> = <code>Change in EBIT ÷ Degree of operating leverage</code></li><li><strong>Change in EBIT</strong> = <code>Change in sales × Degree of operating leverage</code></li><li><strong>Period one EBIT</strong> = <code>Period two EBIT ÷ (Change in EBIT + 1)</code></li><li><strong>Period two EBIT</strong> = <code>Period one EBIT × (Change in EBIT + 1)</code></li><li><strong>Period two sales</strong> = <code>Period one sales × (Change in sales + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Degree of operating leverage</strong> = <code>Change in EBIT ÷ Change in sales</code> — the form to use when Change in EBIT and Change in sales are the values you have.</li><li><strong>Change in sales</strong> = <code>Change in EBIT ÷ Degree of operating leverage</code> — the form to use when Change in EBIT and Degree of operating leverage are the values you have.</li><li><strong>Change in EBIT</strong> = <code>Change in sales × Degree of operating leverage</code> — the form to use when Change in sales and Degree of operating leverage are the values you have.</li><li><strong>Change in EBIT</strong> = <code>( − Period one EBIT + Period two EBIT) ÷ Period one EBIT</code> — the form to use when Period one EBIT and Period two EBIT are the values you have.</li><li><strong>Period one EBIT</strong> = <code>Period two EBIT ÷ (Change in EBIT + 1)</code> — the form to use when Period two EBIT and Change in EBIT are the values you have.</li><li><strong>Period two EBIT</strong> = <code>Period one EBIT × (Change in EBIT + 1)</code> — the form to use when Period one EBIT and Change in EBIT are the values you have.</li><li><strong>Change in sales</strong> = <code>( − Period one sales + Period two sales) ÷ Period one sales</code> — the form to use when Period one sales and Period two sales are the values you have.</li><li><strong>Period two sales</strong> = <code>Period one sales × (Change in sales + 1)</code> — the form to use when Period one sales and Change in sales are the values you have.</li></ul><p>Any one of Degree of operating leverage, Change in sales and Change in EBIT can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Period one sales from 10 to 20, leaving every other box alone. The panel moves from <strong>Change in sales</strong> 0.1 perc to <strong>Change in sales</strong> 0.1 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Change in sales and Change in EBIT is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Period one sales, Period one EBIT and Period two sales are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Change in sales left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Change in sales is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Change in EBIT left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Change in EBIT is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Change in sales to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Change in sales</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. If you have the percentual change (period to period) of sales, put it here. Otherwise, add the specific period data in the section &quot;Period to period specific data&quot; above. Change it and Change in EBIT, Degree of operating leverage and Period two sales changes with it. Have it to hand before you start: Change in sales is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Change in EBIT</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. If you have the percentual change (period to period) of EBIT, put it here. Otherwise, add the specific period data in the section &quot;Period to period specific data&quot; above. Change it and Change in sales, Degree of operating leverage and Period one EBIT changes with it. Have it to hand before you start: Change in EBIT is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Period one sales</strong> is a plain number. It is computed from Period two sales and Change in sales, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Period one EBIT</strong> is a plain number. It is computed from Period two EBIT and Change in EBIT, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Period two sales</strong> is a plain number. It is computed from Period one sales and Change in sales, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Period two EBIT</strong> is a plain number. It is computed from Period one EBIT and Change in EBIT, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Degree of operating leverage</strong> is a plain number. It is computed from Change in EBIT and Change in sales, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Period one sales follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Change in sales and Change in EBIT are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Change in sales and Change in EBIT and the number you are missing is Period one sales and Period one EBIT.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/parking-ratio">Parking ratio Calculator</a>, <a href="/finance/partially-amortized-loan">Partially amortized loan</a> and <a href="/finance/pay-raise">Pay raise Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Degree of operating leverage calculator work out?', 'a' => <<<'TXT'
            Period one sales, Period one EBIT, Period two sales and Period two EBIT, from Change in EBIT and Change in sales. The relationship is Degree of operating leverage = Change in EBIT ÷ Change in sales.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Change in sales (percent), Change in EBIT (percent). With change in sales and change in EBIT in place, Period one sales can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Degree of operating leverage, Change in sales, Change in EBIT and Period one EBIT blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Change in sales = 0.1 perc. Those are the defaults written into the form — move Change in sales and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Period one sales is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Change in sales left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Period one sales keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/parking-ratio', 'name' => 'Parking ratio Calculator'],
            ['path' => '/finance/partially-amortized-loan', 'name' => 'Partially amortized loan'],
            ['path' => '/finance/pay-raise', 'name' => 'Pay raise Calculator'],
        ],
        'authors' => [],
    ],
];
