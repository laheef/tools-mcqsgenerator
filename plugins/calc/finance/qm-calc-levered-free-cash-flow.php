<?php

/**
 * Levered free cash flow
 * /finance/levered-free-cash-flow
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Levered free cash flow',
    'meta' => ['title' => 'Levered free cash flow Calculator: Free, With Steps', 'description' => 'Enter EBITDA and capital expenditures and get levered free cash flow back. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Levered free cash flow Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ebitda',
                            'label' => 'EBITDA',
                            'type' => 'number',
                            'help' => 'Earnings before interests, taxes, depreciation, and amortization.',
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
                            'name' => 'capex',
                            'label' => 'Capital expenditures',
                            'type' => 'number',
                            'help' => 'Company expenses that are used for expanding the business or acquiring new equipment.',
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
                            'name' => 'net_working_capital',
                            'label' => 'Net change in working capital',
                            'type' => 'number',
                            'help' => 'Cash flow change in operating assets and liabilities such inventories, accounts receivables, accounts payables, among others.',
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
                            'name' => 'debt',
                            'label' => 'Mandatory debt repayments',
                            'type' => 'number',
                            'help' => 'To be found in the cash from financing section in the cash flow statement.',
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
                            'name' => 'lfcf',
                            'label' => 'Levered free cash flow',
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
                        ['type' => 'note', 'text' => 'Negative EBITDA, huh? Check its revenue growth to see if a potential good investment.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Negative levered free cash flow (LFCF), huh? Check company operating cash flow compounded annual growth rate. It is a good indicator of company LFCF possible future.
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'lfcf = ebitda + net_working_capital - capex - debt',
            'results' => [
                'net_working_capital' => 'capex + debt - ebitda + lfcf',
                'ebitda' => 'capex + debt + lfcf - net_working_capital',
                'lfcf' => '-capex - debt + ebitda + net_working_capital',
                'debt' => '-capex + ebitda - lfcf + net_working_capital',
                'capex' => '-debt + ebitda - lfcf + net_working_capital',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Levered free cash flow takes EBITDA, Capital expenditures and Net change in working capital and returns Levered free cash flow. There is no hidden constant here: change levered free cash flow and EBITDA moves with it. The main result, Levered free cash flow, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Levered free cash flow calculator works', 'html' => <<<'TXT'
            <p>Levered free cash flow answers one question from 4 numbers, and the answer is Levered free cash flow.</p><p>In the form&#039;s own words, Levered free cash flow = − Capital expenditures − Mandatory debt repayments + EBITDA + Net change in working capital.</p><p>What comes back is Levered free cash flow — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>EBITDA</strong> — in USD. Earnings before interests, taxes, depreciation, and amortization.</li><li><strong>Capital expenditures</strong> — in USD. Company expenses that are used for expanding the business or acquiring new equipment.</li><li><strong>Net change in working capital</strong> — in USD. Cash flow change in operating assets and liabilities such inventories, accounts receivables, accounts payables, among others.</li><li><strong>Mandatory debt repayments</strong> — in USD. To be found in the cash from financing section in the cash flow statement.</li></ul><p>The answer comes back as Levered free cash flow in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — EBITDA = 10 USD, Capital expenditures = 100 USD, Net change in working capital = 1000 USD and Mandatory debt repayments = 10 USD — through the same formula and the panel reports <strong>Levered free cash flow</strong> = 900 USD.</p><ul><li><strong>Levered free cash flow</strong> = 900 USD</li></ul><p>That is <strong>Levered free cash flow</strong> = <code>− Capital expenditures − Mandatory debt repayments + EBITDA + Net change in working capital</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Levered free cash flow</strong> = 900 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Levered free cash flow takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Levered free cash flow</strong> = <code>− Capital expenditures − Mandatory debt repayments + EBITDA + Net change in working capital</code></li><li><strong>Net change in working capital</strong> = <code>Capital expenditures + Mandatory debt repayments − EBITDA + Levered free cash flow</code></li><li><strong>EBITDA</strong> = <code>Capital expenditures + Mandatory debt repayments + Levered free cash flow − Net change in working capital</code></li><li><strong>Mandatory debt repayments</strong> = <code>− Capital expenditures + EBITDA − Levered free cash flow + Net change in working capital</code></li><li><strong>Capital expenditures</strong> = <code>− Mandatory debt repayments + EBITDA − Levered free cash flow + Net change in working capital</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Levered free cash flow</strong> = <code>− Capital expenditures − Mandatory debt repayments + EBITDA + Net change in working capital</code> — the form to use when Capital expenditures, Mandatory debt repayments, EBITDA and Net change in working capital are the values you have.</li><li><strong>Net change in working capital</strong> = <code>Capital expenditures + Mandatory debt repayments − EBITDA + Levered free cash flow</code> — the form to use when Capital expenditures, Mandatory debt repayments, EBITDA and Levered free cash flow are the values you have.</li><li><strong>EBITDA</strong> = <code>Capital expenditures + Mandatory debt repayments + Levered free cash flow − Net change in working capital</code> — the form to use when Capital expenditures, Mandatory debt repayments, Levered free cash flow and Net change in working capital are the values you have.</li><li><strong>Mandatory debt repayments</strong> = <code>− Capital expenditures + EBITDA − Levered free cash flow + Net change in working capital</code> — the form to use when Capital expenditures, EBITDA, Levered free cash flow and Net change in working capital are the values you have.</li><li><strong>Capital expenditures</strong> = <code>− Mandatory debt repayments + EBITDA − Levered free cash flow + Net change in working capital</code> — the form to use when Mandatory debt repayments, EBITDA, Levered free cash flow and Net change in working capital are the values you have.</li></ul><p>Any one of Levered free cash flow, Net change in working capital and EBITDA can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double EBITDA from 10 to 20, leaving every other box alone. The panel moves from <strong>Levered free cash flow</strong> 900 USD to <strong>Levered free cash flow</strong> 910 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Levered free cash flow is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>EBITDA left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If EBITDA is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Capital expenditures left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Capital expenditures is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Net change in working capital left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net change in working capital is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in EBITDA and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Levered free cash flow form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>EBITDA</strong> takes a plain number with no unit attached. Earnings before interests, taxes, depreciation, and amortization. It feeds Net change in working capital, Levered free cash flow and Mandatory debt repayments. Fill it from a measurement rather than a memory — EBITDA is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Capital expenditures</strong> takes a plain number with no unit attached. Company expenses that are used for expanding the business or acquiring new equipment. It feeds Net change in working capital, EBITDA and Levered free cash flow. Fill it from a measurement rather than a memory — Capital expenditures is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Net change in working capital</strong> takes a plain number with no unit attached. Cash flow change in operating assets and liabilities such inventories, accounts receivables, accounts payables, among others. It feeds EBITDA, Levered free cash flow and Mandatory debt repayments. Fill it from a measurement rather than a memory — Net change in working capital is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Mandatory debt repayments</strong> takes a plain number with no unit attached. To be found in the cash from financing section in the cash flow statement. It feeds Net change in working capital, EBITDA and Levered free cash flow. Fill it from a measurement rather than a memory — Mandatory debt repayments is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Levered free cash flow</strong> is a plain number and the page's own defaults put it at 900. It is worked out from Capital expenditures, Mandatory debt repayments, EBITDA and Net change in working capital. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Levered free cash flow</th></tr></thead><tbody><tr><td><strong>EBITDA</strong> +10%</td><td>+0.11%</td></tr><tr><td><strong>Capital expenditures</strong> +10%</td><td>-1.11%</td></tr><tr><td><strong>Net change in working capital</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Mandatory debt repayments</strong> +10%</td><td>-0.11%</td></tr></tbody></table><p>Ranked by leverage, Net change in working capital sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. By contrast, EBITDA and Mandatory debt repayments barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in EBITDA = 5 USD, Capital expenditures = 50 USD, Net change in working capital = 500 USD and Mandatory debt repayments = 5 USD and the page reports <strong>Levered free cash flow</strong> = 450 USD.</li><li>Feed in EBITDA = 30 USD, Capital expenditures = 100 USD, Net change in working capital = 1000 USD and Mandatory debt repayments = 10 USD and the page reports <strong>Levered free cash flow</strong> = 920 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Levered free cash flow follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes EBITDA, Capital expenditures and Net change in working capital are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are EBITDA, Capital expenditures and Net change in working capital and the number you are missing is Levered free cash flow.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/unemployment-benefit-heals">Unemployment benefit - HEALS vs. HEROES Calculator</a>, <a href="/finance/lost-wages-assistance">Unemployment benefit - Lost Wages Assistance (LWA) Calculator</a> and <a href="/finance/unemployment-rate">Unemployment rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Levered free cash flow calculator work out?', 'a' => <<<'TXT'
            Levered free cash flow, from Capital expenditures, Mandatory debt repayments, EBITDA and Net change in working capital. The relationship is Levered free cash flow = − Capital expenditures − Mandatory debt repayments + EBITDA + Net change in working capital.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            EBITDA (USD), Capital expenditures (USD), Net change in working capital (USD), Mandatory debt repayments (USD). Fill EBITDA, capital expenditures and net change in working capital and leave Levered free cash flow empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Levered free cash flow, Net change in working capital, EBITDA and Mandatory debt repayments blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Levered free cash flow = 900 USD. Those are the defaults written into the form — move EBITDA and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Levered free cash flow is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave EBITDA blank and the page solves for it, reporting Levered free cash flow instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Levered free cash flow at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/unemployment-benefit-heals', 'name' => 'Unemployment benefit - HEALS vs. HEROES Calculator'],
            ['path' => '/finance/lost-wages-assistance', 'name' => 'Unemployment benefit - Lost Wages Assistance (LWA) Calculator'],
            ['path' => '/finance/unemployment-rate', 'name' => 'Unemployment rate Calculator'],
        ],
        'authors' => [],
    ],
];
