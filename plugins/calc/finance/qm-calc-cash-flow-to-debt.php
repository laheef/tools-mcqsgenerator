<?php

/**
 * Cash flow to debt ratio
 * /finance/cash-flow-to-debt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cash flow to debt ratio',
    'meta' => ['title' => 'Cash flow to debt ratio Calculator: Free, With Steps', 'description' => 'Cash flow to debt ratio works out total debt from operating cash flow and short term debt. Results come back in USD, with any other unit a click away.', 'h1' => 'Cash flow to debt ratio Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Operating_cash_flow',
                            'label' => 'Operating cash flow',
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
                            'name' => 'Total_debt',
                            'label' => 'Total debt',
                            'type' => 'number',
                            'help' => 'If you have figures for short and long term debt, open the Total debt components section below to calculator the total debt.',
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
                            'name' => 'Cash_flow_to_debt',
                            'label' => 'Cash flow to debt ratio',
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
                                ['when' => 'Operating_cash_flow < 0', 'text' => 'Your company looks to be losing money. Better analyze its interest coverage ratio.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Show debt to cash flow ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Debt_to_cash_flow',
                            'label' => 'Debt to cash flow ratio',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Total debt components',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Short_term_debt',
                            'label' => 'Short term debt',
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
                            'name' => 'Long_term_debt',
                            'label' => 'Long term debt',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            Remember that the long term debt has a current part that is going to be due in the next 12 months from the reporting time. Do not forget to include it for a more precise calculation.
                            TXT,
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
            'title' => 'Cash_flow_to_debt=Operating_cash_flow/Total_debt',
            'results' => ['Operating_cash_flow' => 'Cash_flow_to_debt*Total_debt', 'Total_debt' => 'Operating_cash_flow/Cash_flow_to_debt', 'Cash_flow_to_debt' => 'Operating_cash_flow/Total_debt'],
        ],
        [
            'title' => 'Debt_to_cash_flow = Cash_flow_to_debt^(-1)',
            'results' => ['Debt_to_cash_flow' => '1/Cash_flow_to_debt', 'Cash_flow_to_debt' => '1/Debt_to_cash_flow'],
        ],
        [
            'title' => 'Total_debt = Short_term_debt + Long_term_debt',
            'results' => ['Long_term_debt' => '-Short_term_debt + Total_debt', 'Short_term_debt' => '-Long_term_debt + Total_debt', 'Total_debt' => 'Long_term_debt + Short_term_debt'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Operating cash flow and Total debt into Cash flow to debt ratio and the answer comes back as Cash flow to debt ratio and Debt to cash flow ratio. Nothing is looked up on this page: cash flow to debt ratio is computed from operating cash flow and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Cash flow to debt ratio is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Cash flow to debt ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cash flow to debt ratio: it takes 2 numbers and reports Cash flow to debt ratio, Debt to cash flow ratio and Short term debt.</p><p>In the form&#039;s own words, Cash flow to debt ratio = Operating cash flow ÷ Total debt.</p><p>The answers are Cash flow to debt ratio, Debt to cash flow ratio, Short term debt and Long term debt; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Operating cash flow</strong> — in USD</li><li><strong>Total debt</strong> — in USD. If you have figures for short and long term debt, open the Total debt components section below to calculator the total debt.</li></ul><p>What you get back is Cash flow to debt ratio in percent, Debt to cash flow ratio, Short term debt in USD, Long term debt in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Operating cash flow = 10 USD, Cash flow to debt ratio = 100 perc, Debt to cash flow ratio = 1000, Short term debt = 10 USD and Long term debt = 100 USD — through the same formula and the panel reports <strong>Total debt</strong> = 0.1 USD.</p><ul><li><strong>Total debt</strong> = 0.1 USD</li></ul><p>The line behind those figures is <strong>Cash flow to debt ratio</strong> = <code>Operating cash flow ÷ Total debt</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total debt</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Cash flow to debt ratio lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cash flow to debt ratio</strong> = <code>Operating cash flow ÷ Total debt</code></li><li><strong>Operating cash flow</strong> = <code>Cash flow to debt ratio × Total debt</code></li><li><strong>Total debt</strong> = <code>Operating cash flow ÷ Cash flow to debt ratio</code></li><li><strong>Debt to cash flow ratio</strong> = <code>1 ÷ Cash flow to debt ratio</code></li><li><strong>Long term debt</strong> = <code>− Short term debt + Total debt</code></li><li><strong>Short term debt</strong> = <code>− Long term debt + Total debt</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cash flow to debt ratio</strong> = <code>Operating cash flow ÷ Total debt</code> — the form to use when Operating cash flow and Total debt are the values you have.</li><li><strong>Operating cash flow</strong> = <code>Cash flow to debt ratio × Total debt</code> — the form to use when Cash flow to debt ratio and Total debt are the values you have.</li><li><strong>Total debt</strong> = <code>Operating cash flow ÷ Cash flow to debt ratio</code> — the form to use when Operating cash flow and Cash flow to debt ratio are the values you have.</li><li><strong>Debt to cash flow ratio</strong> = <code>1 ÷ Cash flow to debt ratio</code> — the form to use when Cash flow to debt ratio are the values you have.</li><li><strong>Cash flow to debt ratio</strong> = <code>1 ÷ Debt to cash flow ratio</code> — the form to use when Debt to cash flow ratio are the values you have.</li><li><strong>Total debt</strong> = <code>Long term debt + Short term debt</code> — the form to use when Long term debt and Short term debt are the values you have.</li><li><strong>Long term debt</strong> = <code>− Short term debt + Total debt</code> — the form to use when Short term debt and Total debt are the values you have.</li><li><strong>Short term debt</strong> = <code>− Long term debt + Total debt</code> — the form to use when Long term debt and Total debt are the values you have.</li></ul><p>Any one of Cash flow to debt ratio, Operating cash flow and Total debt can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Operating cash flow, from 10 to 20 — and the answers go from <strong>Total debt</strong> 0.1 USD to <strong>Total debt</strong> 0.2 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cash flow to debt ratio, Debt to cash flow ratio and Short term debt are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Operating cash flow left as a guess.</strong> Anything typed into Operating cash flow is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total debt left as a guess.</strong> Anything typed into Total debt is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Operating cash flow is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Operating cash flow</strong> takes a plain number with no unit attached. The page reads it when it works out Total debt and Cash flow to debt ratio. Have it to hand before you start: Operating cash flow is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total debt</strong> takes a plain number with no unit attached. If you have figures for short and long term debt, open the Total debt components section below to calculator the total debt. The page reads it when it works out Operating cash flow, Cash flow to debt ratio and Long term debt. Have it to hand before you start: Total debt is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cash flow to debt ratio</strong> is a percent figure. The value follows from Operating cash flow and Total debt. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Debt to cash flow ratio</strong> is a plain number. The value follows from Cash flow to debt ratio. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Short term debt</strong> is a plain number. The value follows from Long term debt and Total debt. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Long term debt</strong> is a plain number. The value follows from Short term debt and Total debt. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total debt</th></tr></thead><tbody><tr><td><strong>Operating cash flow</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Cash flow to debt ratio</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Debt to cash flow ratio</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Short term debt</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Long term debt</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Operating cash flow: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Debt to cash flow ratio, Short term debt and Long term debt barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Operating cash flow = 5 USD, Cash flow to debt ratio = 50 perc, Debt to cash flow ratio = 500, Short term debt = 5 USD and Long term debt = 50 USD, the answer is <strong>Total debt</strong> = 0.1 USD.</li><li>With Operating cash flow = 30 USD, Cash flow to debt ratio = 100 perc, Debt to cash flow ratio = 1000, Short term debt = 10 USD and Long term debt = 100 USD, the answer is <strong>Total debt</strong> = 0.3 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cash flow to debt ratio is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Operating cash flow and Total debt are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Operating cash flow and Total debt and the number you are missing is Cash flow to debt ratio and Debt to cash flow ratio.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/price-to-sales-ratio">Price to sales ratio Calculator</a>, <a href="/finance/price-to-earnings">Price/earnings ratio</a> and <a href="/finance/private-savings">Private savings Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cash flow to debt ratio calculator work out?', 'a' => <<<'TXT'
            Cash flow to debt ratio, Debt to cash flow ratio, Short term debt and Long term debt, from Operating cash flow and Total debt. The relationship is Cash flow to debt ratio = Operating cash flow ÷ Total debt.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Operating cash flow (USD), Total debt (USD). With operating cash flow and total debt in place, Cash flow to debt ratio can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Cash flow to debt ratio, Operating cash flow, Total debt and Debt to cash flow ratio blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total debt = 0.1 USD. That comes from the page\'s own defaults, entered in Operating cash flow; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Cash flow to debt ratio is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Operating cash flow left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cash flow to debt ratio keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/price-to-sales-ratio', 'name' => 'Price to sales ratio Calculator'],
            ['path' => '/finance/price-to-earnings', 'name' => 'Price/earnings ratio'],
            ['path' => '/finance/private-savings', 'name' => 'Private savings Calculator'],
        ],
        'authors' => [],
    ],
];
