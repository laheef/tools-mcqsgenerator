<?php

/**
 * Expense ratio
 * /finance/expense-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Expense ratio',
    'meta' => ['title' => 'Expense ratio Calculator — Formula & Results', 'description' => 'Expense ratio works out future value of total investment and Total cost of ETF and reports both. Every box can be solved for, not only the one in the title.', 'h1' => 'Expense ratio Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InitialInv',
                            'label' => 'Initial investment',
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
                            'name' => 'PerInv',
                            'label' => 'Yearly investment',
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
                            'name' => 'Duration',
                            'label' => 'Duration',
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
                            'name' => 'ExpReturn',
                            'label' => 'Expected return',
                            'type' => 'number',
                            'help' => 'Yearly expected investment return.',
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
                            'name' => 'ExpRatio',
                            'label' => 'Expense Ratio ',
                            'type' => 'number',
                            'help' => 'The expense ratio is the fee that you are paying for the maintenance of the ETF/ trust fund.',
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
                            'name' => 'FutureValue_TotInv',
                            'label' => 'Future value of total investment',
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
                            'name' => 'TotCost_ETF',
                            'label' => 'Total cost of ETF',
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
            'title' => 'Total future value with ETF\'s expense ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EffectiveInvRet',
                            'label' => 'Effective investment return ',
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
                            'name' => 'FutureValue_InitialInv',
                            'label' => 'Initial investment future value',
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
                            'name' => 'FutureValue_PerInv',
                            'label' => 'Periodic investment future value',
                            'type' => 'number',
                            'suffix' => '/ year',
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
            'title' => 'FutureValue_InitialInv = InitialInv* (1 + EffectiveInvRet)^(Duration)',
            'results' => ['InitialInv' => 'FutureValue_InitialInv*pow(EffectiveInvRet + 1, -Duration)', 'FutureValue_InitialInv' => 'InitialInv*pow(EffectiveInvRet + 1, Duration)', 'Duration' => 'log(FutureValue_InitialInv/InitialInv)/log(EffectiveInvRet + 1)', 'EffectiveInvRet' => 'pow(FutureValue_InitialInv/InitialInv, 1/Duration) - 1'],
        ],
        [
            'title' => 'FutureValue_PerInv = PerInv*((1 +EffectiveInvRet) ^ Duration - 1) / EffectiveInvRet',
            'results' => ['PerInv' => 'EffectiveInvRet*FutureValue_PerInv/(pow(EffectiveInvRet + 1, Duration) - 1)', 'Duration' => 'log((EffectiveInvRet*FutureValue_PerInv + PerInv)/PerInv)/log(EffectiveInvRet + 1)', 'FutureValue_PerInv' => 'PerInv*(pow(EffectiveInvRet + 1, Duration) - 1)/EffectiveInvRet'],
        ],
        [
            'title' => 'FutureValue_TotInv= FutureValue_InitialInv + FutureValue_PerInv',
            'results' => ['FutureValue_TotInv' => 'FutureValue_InitialInv + FutureValue_PerInv', 'FutureValue_InitialInv' => '-FutureValue_PerInv + FutureValue_TotInv', 'FutureValue_PerInv' => '-FutureValue_InitialInv + FutureValue_TotInv'],
        ],
        [
            'title' => 'EffectiveInvRet = ExpReturn - ExpRatio',
            'results' => ['ExpRatio' => '-EffectiveInvRet + ExpReturn', 'EffectiveInvRet' => '-ExpRatio + ExpReturn', 'ExpReturn' => 'EffectiveInvRet + ExpRatio'],
        ],
        [
            'title' => 'TotCost_ETF=((InitialInv* (1 + ExpReturn )^(Duration)) + (PerInv*((1 +ExpReturn) ^ Duration- 1) / ExpReturn))-FutureValue_TotInv',
            'results' => [
                'FutureValue_TotInv' => '(ExpReturn*(InitialInv*pow(ExpReturn + 1, Duration) - TotCost_ETF) + PerInv*pow(ExpReturn + 1, Duration) - PerInv)/ExpReturn',
                'InitialInv' => 'pow(ExpReturn + 1, -Duration)*(ExpReturn*(FutureValue_TotInv + TotCost_ETF) - PerInv*pow(ExpReturn + 1, Duration) + PerInv)/ExpReturn',
                'PerInv' => 'ExpReturn*(FutureValue_TotInv - InitialInv*pow(ExpReturn + 1, Duration) + TotCost_ETF)/(pow(ExpReturn + 1, Duration) - 1)',
                'TotCost_ETF' => '(ExpReturn*(-FutureValue_TotInv + InitialInv*pow(ExpReturn + 1, Duration)) + PerInv*pow(ExpReturn + 1, Duration) - PerInv)/ExpReturn',
                'Duration' => 'log((ExpReturn*FutureValue_TotInv + ExpReturn*TotCost_ETF + PerInv)/(ExpReturn*InitialInv + PerInv))/log(ExpReturn + 1)',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Initial investment, Duration and Effective investment return into Expense ratio and the answer comes back as Yearly investment and Expected return. There is no hidden constant here: change yearly investment and initial investment moves with it. The main result, Yearly investment, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Expense ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Expense ratio: it takes 3 numbers and reports Yearly investment, Expected return and Expense Ratio.</p><p>Written with the labels from the form, Initial investment future value = Initial investment × (Effective investment return + 1)^(Duration).</p><p>The answers are Yearly investment, Expected return, Expense Ratio and Future value of total investment; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Initial investment</strong> — in USD</li><li><strong>Duration</strong> — in years</li><li><strong>Effective investment return</strong> — in percent</li></ul><p>What you get back is Yearly investment in USD, Expected return in percent, Expense Ratio in percent, Future value of total investment in USD, Total cost of ETF in USD, Initial investment future value in USD, Periodic investment future value in / year, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Initial investment = 10 USD, Yearly investment = 100 USD, Duration = 1000 yrs, Expected return = 10 perc, Expense Ratio = 100 perc, Future value of total investment = 1000 USD, Total cost of ETF = 10 USD, Effective investment return = 100 perc and Periodic investment future value = 1000 / year — through the same formula and the panel reports <strong>Initial investment future value</strong> = 10 USD.</p><ul><li><strong>Initial investment future value</strong> = 10 USD</li></ul><p>That is <strong>Initial investment future value</strong> = <code>Initial investment × (Effective investment return + 1)^(Duration)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Initial investment future value</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Expected return lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Initial investment future value</strong> = <code>Initial investment × (Effective investment return + 1)^(Duration)</code></li><li><strong>Initial investment</strong> = <code>Initial investment future value × (Effective investment return + 1)^(− Duration)</code></li><li><strong>Duration</strong> = <code>ln(Initial investment future value ÷ Initial investment) ÷ ln(Effective investment return + 1)</code></li><li><strong>Effective investment return</strong> = <code>(Initial investment future value ÷ Initial investment)^(1 ÷ Duration) − 1</code></li><li><strong>Periodic investment future value</strong> = <code>Yearly investment × ((Effective investment return + 1)^(Duration) − 1) ÷ Effective investment return</code></li><li><strong>Yearly investment</strong> = <code>Effective investment return × Periodic investment future value ÷ ((Effective investment return + 1)^(Duration) − 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Initial investment future value</strong> = <code>Initial investment × (Effective investment return + 1)^(Duration)</code> — the form to use when Initial investment, Effective investment return and Duration are the values you have.</li><li><strong>Initial investment</strong> = <code>Initial investment future value × (Effective investment return + 1)^(− Duration)</code> — the form to use when Initial investment future value, Effective investment return and Duration are the values you have.</li><li><strong>Duration</strong> = <code>ln(Initial investment future value ÷ Initial investment) ÷ ln(Effective investment return + 1)</code> — the form to use when Initial investment future value, Initial investment and Effective investment return are the values you have.</li><li><strong>Effective investment return</strong> = <code>(Initial investment future value ÷ Initial investment)^(1 ÷ Duration) − 1</code> — the form to use when Initial investment future value, Initial investment and Duration are the values you have.</li><li><strong>Periodic investment future value</strong> = <code>Yearly investment × ((Effective investment return + 1)^(Duration) − 1) ÷ Effective investment return</code> — the form to use when Yearly investment, Effective investment return and Duration are the values you have.</li><li><strong>Yearly investment</strong> = <code>Effective investment return × Periodic investment future value ÷ ((Effective investment return + 1)^(Duration) − 1)</code> — the form to use when Effective investment return, Periodic investment future value and Duration are the values you have.</li><li><strong>Duration</strong> = <code>ln((Effective investment return × Periodic investment future value + Yearly investment) ÷ Yearly investment) ÷ ln(Effective investment return + 1)</code> — the form to use when Effective investment return, Periodic investment future value and Yearly investment are the values you have.</li><li><strong>Future value of total investment</strong> = <code>Initial investment future value + Periodic investment future value</code> — the form to use when Initial investment future value and Periodic investment future value are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Initial investment future value, Initial investment and Duration can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Initial investment from 10 to 20, leaving every other box alone. The panel moves from <strong>Initial investment future value</strong> 10 USD to <strong>Initial investment future value</strong> 20 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Duration and Effective investment return carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Yearly investment, Expected return and Expense Ratio are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial investment left as a guess.</strong> Anything typed into Initial investment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Duration left as a guess.</strong> Anything typed into Duration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial investment is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Initial investment</strong> takes a plain number with no unit attached. It feeds Initial investment future value, Duration and Effective investment return. Have it to hand before you start: Initial investment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Duration</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. It feeds Initial investment, Initial investment future value and Effective investment return. Have it to hand before you start: Duration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Effective investment return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Initial investment, Initial investment future value and Duration. Have it to hand before you start: Effective investment return is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Yearly investment</strong> is a plain number. The value follows from Effective investment return, Periodic investment future value and Duration. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Expected return</strong> is a percent figure. The value follows from Effective investment return and Expense Ratio. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Expense Ratio</strong> is a percent figure. The value follows from Effective investment return and Expected return. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Future value of total investment</strong> is a plain number. The value follows from Initial investment future value and Periodic investment future value. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total cost of ETF</strong> is a plain number. The value follows from Expected return, Future value of total investment, Initial investment and Duration. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Initial investment future value</strong> is a plain number and the page's own defaults put it at 10. The value follows from Initial investment, Effective investment return and Duration. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Periodic investment future value</strong> is a plain number. The value follows from Yearly investment, Effective investment return and Duration. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Yearly investment is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent and years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Initial investment, Duration and Effective investment return and the number you are missing is Yearly investment and Expected return.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/cell-phone-plan">Cell phone plan Calculator</a>, <a href="/finance/gtin-check-digit">Check digit Calculator</a> and <a href="/finance/child-tax-credit">Child tax credit Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Expense ratio calculator work out?', 'a' => <<<'TXT'
            Yearly investment, Expected return, Expense Ratio and Future value of total investment, from Initial investment, Effective investment return and Duration. The relationship is Initial investment future value = Initial investment × (Effective investment return + 1)^(Duration).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial investment (USD), Duration (years), Effective investment return (percent). Fill initial investment, duration and effective investment return and leave Yearly investment empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Initial investment future value, Initial investment, Duration and Effective investment return can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Initial investment future value = 10 USD. The figures come from Initial investment as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Yearly investment is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial investment left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Yearly investment keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/cell-phone-plan', 'name' => 'Cell phone plan Calculator'],
            ['path' => '/finance/gtin-check-digit', 'name' => 'Check digit Calculator'],
            ['path' => '/finance/child-tax-credit', 'name' => 'Child tax credit Calculator'],
        ],
        'authors' => [],
    ],
];
