<?php

/**
 * Value at risk (VaR)
 * /finance/var
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Value at risk (VaR)',
    'meta' => ['title' => 'Value at risk (Va r) — Free Online Calculator', 'description' => 'Enter portfolio value, standard deviation and expected return and Value at risk (VaR) returns vaR. Results come back in USD, with any other unit a click away.', 'h1' => 'Value at risk (Va r) Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => 'Your portfolio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'portfolio_value',
                            'label' => 'Portfolio value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'standard_deviation',
                            'label' => 'Standard deviation',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'expected_annual_return',
                            'label' => 'Expected return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days',
                            'label' => 'Timeframe',
                            'type' => 'number',
                            'help' => 'The time horizon for the VaR calculation.',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Value at risk (VaR)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'var_type',
                            'label' => 'Which VaR are you calculating?',
                            'type' => 'select',
                            'options' => ['10% VaR' => '1.282', '5% VaR' => '1.645', '1% VaR ' => '2.33', 'Other' => '0'],
                            'dataset' => 'z_score_selection',
                            'default' => '5% VaR',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'z_score',
                            'label' => 'Enter Z-score corresponding to the desired VaR',
                            'type' => 'number',
                            'help' => 'To find the actual z-score, you need to check the normal distribution table to find it for the specified p-value.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'value_at_risk',
                            'label' => 'VaR',
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
                            'name' => 'value_at_risk_other',
                            'label' => 'VaR',
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
            'title' => 'value_at_risk = abs((expected_annual_return - (var_type *days^(1/2)* standard_deviation)) * portfolio_value) ',
            'results' => ['value_at_risk' => 'abs(portfolio_value*(sqrt(days)*standard_deviation*var_type - expected_annual_return))'],
        ],
        [
            'title' => 'value_at_risk_other = abs((expected_annual_return - (z_score *days^(1/2)*  standard_deviation)) * portfolio_value) ',
            'results' => ['value_at_risk_other' => 'abs(portfolio_value*(sqrt(days)*standard_deviation*z_score - expected_annual_return))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Value at risk (VaR) takes Portfolio value, Standard deviation and Expected return and returns VaR and VaR. It is a single relationship that reads vaR out of portfolio value, not a table of canned results keyed by them. Units for VaR default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Value at risk (VaR) calculator works', 'html' => <<<'TXT'
            <p>Value at risk (VaR) answers one question from 5 numbers, and the answer is VaR and VaR.</p><p>Written with the labels from the form, VaR = abs(Portfolio value × (√(Timeframe) × Standard deviation × Which VaR are you calculating? − Expected return)).</p><p>The result panel carries VaR and VaR, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Portfolio value</strong> — in USD</li><li><strong>Standard deviation</strong> — in percent</li><li><strong>Expected return</strong> — in percent</li><li><strong>Timeframe</strong> — in days. The time horizon for the VaR calculation.</li><li><strong>Which VaR are you calculating?</strong> — a plain number, no unit</li></ul><p>The result boxes are VaR in USD, VaR in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Portfolio value = 3 USD, Standard deviation = 4 perc, Expected return = 5 perc, Timeframe = 1 days, Which VaR are you calculating? = 1.65 and Enter Z-score corresponding to the desired VaR = 7 — through the same formula and the panel reports <strong>VaR</strong> = 4.74 USD and <strong>VaR</strong> = 69 USD.</p><ul><li><strong>VaR</strong> = 4.74 USD</li><li><strong>VaR</strong> = 69 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>VaR</strong> = <code>abs(Portfolio value × (√(Timeframe) × Standard deviation × Which VaR are you calculating? − Expected return))</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>VaR</strong> = 4.74 and <strong>VaR</strong> = 69 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Standard deviation offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>VaR</strong> = <code>abs(Portfolio value × (√(Timeframe) × Standard deviation × Which VaR are you calculating? − Expected return))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>VaR</strong> = <code>abs(Portfolio value × (√(Timeframe) × Standard deviation × Which VaR are you calculating? − Expected return))</code> — the form to use when Portfolio value, Timeframe, Standard deviation and Which VaR are you calculating? are the values you have.</li><li><strong>VaR</strong> = <code>abs(Portfolio value × (√(Timeframe) × Standard deviation × Enter Z-score corresponding to the desired VaR − Expected return))</code> — the form to use when Portfolio value, Timeframe, Standard deviation and Enter Z-score corresponding to the desired VaR are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of VaR and VaR can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Portfolio value from 3 to 6, leaving every other box alone. The panel moves from <strong>VaR</strong> 4.74 USD and <strong>VaR</strong> 69 USD to <strong>VaR</strong> 9.48 USD and <strong>VaR</strong> 138 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Standard deviation, Expected return and Timeframe is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with VaR and VaR are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Portfolio value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Portfolio value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Standard deviation left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Standard deviation is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Portfolio value and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Portfolio value</strong> takes a plain number with no unit attached. The page reads it when it works out VaR and VaR. Have it to hand before you start: Portfolio value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Standard deviation</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out VaR and VaR. Have it to hand before you start: Standard deviation is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Expected return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out VaR and VaR. Have it to hand before you start: Expected return is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Timeframe</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. The time horizon for the VaR calculation. The page reads it when it works out VaR and VaR. Have it to hand before you start: Timeframe is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Which VaR are you calculating?</strong> takes a plain number with no unit attached. The page reads it when it works out VaR. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Which VaR are you calculating? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>VaR</strong> is a plain number and the page's own defaults put it at 4.74. It is worked out from Portfolio value, Timeframe, Standard deviation and Which VaR are you calculating?. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>VaR</strong> is a plain number and the page's own defaults put it at 69. It is worked out from Portfolio value, Timeframe, Standard deviation and Enter Z-score corresponding to the desired VaR. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>VaR</th><th>VaR</th></tr></thead><tbody><tr><td><strong>Portfolio value</strong> +10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Standard deviation</strong> +10%</td><td>+41.65%</td><td>+12.17%</td></tr><tr><td><strong>Expected return</strong> +10%</td><td>-31.65%</td><td>-2.17%</td></tr><tr><td><strong>Timeframe</strong> +10%</td><td>+20.33%</td><td>+5.94%</td></tr><tr><td><strong>Which VaR are you calculating?</strong> +10%</td><td>+41.65%</td><td>+0%</td></tr><tr><td><strong>Enter Z-score corresponding to the desired VaR</strong> +10%</td><td>+0%</td><td>+12.17%</td></tr></tbody></table><p>Ranked by leverage, Standard deviation sits at the top — a ten per cent error in that box shows up as roughly 41.6 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Portfolio value = 1.5 USD, Standard deviation = 2 perc, Expected return = 2.5 perc, Timeframe = 0.5 days, Which VaR are you calculating? = 0.8225 and Enter Z-score corresponding to the desired VaR = 3.5, the answer is <strong>VaR</strong> = 2.01 USD and <strong>VaR</strong> = 3.67 USD.</li><li>With Portfolio value = 9 USD, Standard deviation = 4 perc, Expected return = 5 perc, Timeframe = 1 days, Which VaR are you calculating? = 1.65 and Enter Z-score corresponding to the desired VaR = 7, the answer is <strong>VaR</strong> = 14.22 USD and <strong>VaR</strong> = 207 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> VaR is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and days and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Portfolio value, Standard deviation and Expected return are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Portfolio value, Standard deviation and Expected return and the number you are missing is VaR and VaR.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/va-disability">VA disability Calculator</a>, <a href="/finance/va-loan">VA loan Calculator</a> and <a href="/finance/variable-annuity">Variable annuity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Value at risk (VaR) calculator work out?', 'a' => <<<'TXT'
            VaR and VaR, from Portfolio value, Timeframe, Standard deviation and Which VaR are you calculating?. The relationship is VaR = abs(Portfolio value × (√(Timeframe) × Standard deviation × Which VaR are you calculating? − Expected return)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Portfolio value (USD), Standard deviation (percent), Expected return (percent), Timeframe (days), Which VaR are you calculating?. Enter portfolio value, standard deviation and expected return; VaR is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. VaR and VaR can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'VaR = 4.74 USD and VaR = 69 USD. That comes from the page\'s own defaults, entered in Portfolio value; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of VaR is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Portfolio value left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. VaR keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/va-disability', 'name' => 'VA disability Calculator'],
            ['path' => '/finance/va-loan', 'name' => 'VA loan Calculator'],
            ['path' => '/finance/variable-annuity', 'name' => 'Variable annuity Calculator'],
        ],
        'authors' => [],
    ],
];
