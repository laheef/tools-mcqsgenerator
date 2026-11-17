<?php

/**
 * Unlevered free cash flow
 * /finance/unlevered-free-cash-flow
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Unlevered free cash flow',
    'meta' => ['title' => 'Unlevered free cash flow — Formula & Results', 'description' => 'Enter EBIT and Effective tax rate (ETR) and get Unlevered free cash flow (UFCF) back. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Unlevered free cash flow Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ebit',
                            'label' => 'EBIT',
                            'type' => 'number',
                            'help' => 'Earnings before interest expense and taxes.',
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
                            'name' => 'effective_tax',
                            'label' => 'Effective tax rate (ETR)',
                            'type' => 'number',
                            'help' => 'Percentage of income that businesses pay to the government.',
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
                            'name' => 'depreciation_amortization',
                            'label' => 'Depreciation and amortization (DA)',
                            'type' => 'number',
                            'help' => 'Accounting expense that represents the reduction in value of an asset because of aging.',
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
                            'label' => 'Capital expenditures (CaPex)',
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
                            'label' => 'Change in working capital (ΔWC)',
                            'type' => 'number',
                            'help' => 'Net cash flow change in operating assets and liabilities such inventories, accounts receivables, accounts payables, among others.',
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
                            'name' => 'ufcf',
                            'label' => 'Unlevered free cash flow (UFCF)',
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
                        ['type' => 'note', 'text' => 'Negative EBIT, huh? Check its revenue growth to see if a potential good investment.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        Negative unlevered free cash flow (UFCF), huh? Check company operating cash flow compounded annual growth rate. It is a good indicator of company UFCF possible future.
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'ufcf = ebit * (1 - effective_tax) + depreciation_amortization - capex + net_working_capital',
            'results' => [
                'ufcf' => '-capex + depreciation_amortization - ebit*effective_tax + ebit + net_working_capital',
                'depreciation_amortization' => 'capex + ebit*effective_tax - ebit - net_working_capital + ufcf',
                'ebit' => '(-capex + depreciation_amortization + net_working_capital - ufcf)/(effective_tax - 1)',
                'capex' => 'depreciation_amortization - ebit*effective_tax + ebit + net_working_capital - ufcf',
                'net_working_capital' => 'capex - depreciation_amortization + ebit*effective_tax - ebit + ufcf',
                'effective_tax' => '(-capex + depreciation_amortization + ebit + net_working_capital - ufcf)/ebit',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Unlevered free cash flow takes EBIT, Effective tax rate (ETR) and Depreciation and amortization (DA) and returns Unlevered free cash flow (UFCF). There is no hidden constant here: change unlevered free cash flow (UFCF) and EBIT moves with it. The main result, Unlevered free cash flow (UFCF), is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Unlevered free cash flow calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Unlevered free cash flow: it takes 5 numbers and reports Unlevered free cash flow (UFCF).</p><p>The relationship it solves reads Unlevered free cash flow (UFCF) = − Capital expenditures (CaPex) + Depreciation and amortization (DA) − EBIT × Effective tax rate (ETR) + EBIT + Change in working capital (ΔWC).</p><p>The result panel carries Unlevered free cash flow (UFCF), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>EBIT</strong> — in USD. Earnings before interest expense and taxes.</li><li><strong>Effective tax rate (ETR)</strong> — in percent. Percentage of income that businesses pay to the government.</li><li><strong>Depreciation and amortization (DA)</strong> — in USD. Accounting expense that represents the reduction in value of an asset because of aging.</li><li><strong>Capital expenditures (CaPex)</strong> — in USD. Company expenses that are used for expanding the business or acquiring new equipment.</li><li><strong>Change in working capital (ΔWC)</strong> — in USD. Net cash flow change in operating assets and liabilities such inventories, accounts receivables, accounts payables, among others.</li></ul><p>The answer comes back as Unlevered free cash flow (UFCF) in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, EBIT = 10 USD, Effective tax rate (ETR) = 100 perc, Depreciation and amortization (DA) = 1000 USD, Capital expenditures (CaPex) = 10 USD and Change in working capital (ΔWC) = 100 USD gives <strong>Unlevered free cash flow (UFCF)</strong> = 100 USD.</p><ul><li><strong>Unlevered free cash flow (UFCF)</strong> = 100 USD</li></ul><p>The line behind those figures is <strong>Unlevered free cash flow (UFCF)</strong> = <code>− Capital expenditures (CaPex) + Depreciation and amortization (DA) − EBIT × Effective tax rate (ETR) + EBIT + Change in working capital (ΔWC)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Unlevered free cash flow (UFCF)</strong> = 100 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Effective tax rate (ETR) offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Unlevered free cash flow (UFCF)</strong> = <code>− Capital expenditures (CaPex) + Depreciation and amortization (DA) − EBIT × Effective tax rate (ETR) + EBIT + Change in working capital (ΔWC)</code></li><li><strong>Depreciation and amortization (DA)</strong> = <code>Capital expenditures (CaPex) + EBIT × Effective tax rate (ETR) − EBIT − Change in working capital (ΔWC) + Unlevered free cash flow (UFCF)</code></li><li><strong>EBIT</strong> = <code>( − Capital expenditures (CaPex) + Depreciation and amortization (DA) + Change in working capital (ΔWC) − Unlevered free cash flow (UFCF)) ÷ (Effective tax rate (ETR) − 1)</code></li><li><strong>Capital expenditures (CaPex)</strong> = <code>Depreciation and amortization (DA) − EBIT × Effective tax rate (ETR) + EBIT + Change in working capital (ΔWC) − Unlevered free cash flow (UFCF)</code></li><li><strong>Change in working capital (ΔWC)</strong> = <code>Capital expenditures (CaPex) − Depreciation and amortization (DA) + EBIT × Effective tax rate (ETR) − EBIT + Unlevered free cash flow (UFCF)</code></li><li><strong>Effective tax rate (ETR)</strong> = <code>( − Capital expenditures (CaPex) + Depreciation and amortization (DA) + EBIT + Change in working capital (ΔWC) − Unlevered free cash flow (UFCF)) ÷ EBIT</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Unlevered free cash flow (UFCF)</strong> = <code>− Capital expenditures (CaPex) + Depreciation and amortization (DA) − EBIT × Effective tax rate (ETR) + EBIT + Change in working capital (ΔWC)</code> — the form to use when Capital expenditures (CaPex), Depreciation and amortization (DA), EBIT and Effective tax rate (ETR) are the values you have.</li><li><strong>Depreciation and amortization (DA)</strong> = <code>Capital expenditures (CaPex) + EBIT × Effective tax rate (ETR) − EBIT − Change in working capital (ΔWC) + Unlevered free cash flow (UFCF)</code> — the form to use when Capital expenditures (CaPex), EBIT, Effective tax rate (ETR) and Change in working capital (ΔWC) are the values you have.</li><li><strong>EBIT</strong> = <code>( − Capital expenditures (CaPex) + Depreciation and amortization (DA) + Change in working capital (ΔWC) − Unlevered free cash flow (UFCF)) ÷ (Effective tax rate (ETR) − 1)</code> — the form to use when Capital expenditures (CaPex), Depreciation and amortization (DA), Change in working capital (ΔWC) and Unlevered free cash flow (UFCF) are the values you have.</li><li><strong>Capital expenditures (CaPex)</strong> = <code>Depreciation and amortization (DA) − EBIT × Effective tax rate (ETR) + EBIT + Change in working capital (ΔWC) − Unlevered free cash flow (UFCF)</code> — the form to use when Depreciation and amortization (DA), EBIT, Effective tax rate (ETR) and Change in working capital (ΔWC) are the values you have.</li><li><strong>Change in working capital (ΔWC)</strong> = <code>Capital expenditures (CaPex) − Depreciation and amortization (DA) + EBIT × Effective tax rate (ETR) − EBIT + Unlevered free cash flow (UFCF)</code> — the form to use when Capital expenditures (CaPex), Depreciation and amortization (DA), EBIT and Effective tax rate (ETR) are the values you have.</li><li><strong>Effective tax rate (ETR)</strong> = <code>( − Capital expenditures (CaPex) + Depreciation and amortization (DA) + EBIT + Change in working capital (ΔWC) − Unlevered free cash flow (UFCF)) ÷ EBIT</code> — the form to use when Capital expenditures (CaPex), Depreciation and amortization (DA), EBIT and Change in working capital (ΔWC) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Unlevered free cash flow (UFCF), Depreciation and amortization (DA) and EBIT can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double EBIT from 10 to 20, leaving every other box alone. The panel moves from <strong>Unlevered free cash flow (UFCF)</strong> 100 USD to <strong>Unlevered free cash flow (UFCF)</strong> -890 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Effective tax rate (ETR) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Unlevered free cash flow (UFCF) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>EBIT left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If EBIT is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Effective tax rate (ETR) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Effective tax rate (ETR) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If EBIT is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Unlevered free cash flow form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>EBIT</strong> takes a plain number with no unit attached. Earnings before interest expense and taxes. The page reads it when it works out Unlevered free cash flow (UFCF), Depreciation and amortization (DA) and Capital expenditures (CaPex). Fill it from a measurement rather than a memory — EBIT is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Effective tax rate (ETR)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Percentage of income that businesses pay to the government. The page reads it when it works out Unlevered free cash flow (UFCF), Depreciation and amortization (DA) and EBIT. Fill it from a measurement rather than a memory — Effective tax rate (ETR) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Depreciation and amortization (DA)</strong> takes a plain number with no unit attached. Accounting expense that represents the reduction in value of an asset because of aging. The page reads it when it works out Unlevered free cash flow (UFCF), EBIT and Capital expenditures (CaPex). Fill it from a measurement rather than a memory — Depreciation and amortization (DA) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Capital expenditures (CaPex)</strong> takes a plain number with no unit attached. Company expenses that are used for expanding the business or acquiring new equipment. The page reads it when it works out Unlevered free cash flow (UFCF), Depreciation and amortization (DA) and EBIT. Fill it from a measurement rather than a memory — Capital expenditures (CaPex) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Change in working capital (ΔWC)</strong> takes a plain number with no unit attached. Net cash flow change in operating assets and liabilities such inventories, accounts receivables, accounts payables, among others. The page reads it when it works out Unlevered free cash flow (UFCF), Depreciation and amortization (DA) and EBIT. Fill it from a measurement rather than a memory — Change in working capital (ΔWC) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Unlevered free cash flow (UFCF)</strong> is a plain number and the page's own defaults put it at 100. It is computed from Capital expenditures (CaPex), Depreciation and amortization (DA), EBIT and Effective tax rate (ETR), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Unlevered free cash flow actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Unlevered free cash flow (UFCF) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when EBIT, Effective tax rate (ETR) and Depreciation and amortization (DA) is what you already know and Unlevered free cash flow (UFCF) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/working-capital">Working capital Calculator</a>, <a href="/finance/working-capital-turnover-ratio">Working capital turnover ratio Calculator</a> and <a href="/finance/year-over-year-growth">Year over year growth Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Unlevered free cash flow calculator work out?', 'a' => <<<'TXT'
            Unlevered free cash flow (UFCF), from Capital expenditures (CaPex), Depreciation and amortization (DA), EBIT and Effective tax rate (ETR). The relationship is Unlevered free cash flow (UFCF) = − Capital expenditures (CaPex) + Depreciation and amortization (DA) − EBIT × Effective tax rate (ETR) + EBIT + Change in working capital (ΔWC).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            EBIT (USD), Effective tax rate (ETR) (percent), Depreciation and amortization (DA) (USD), Capital expenditures (CaPex) (USD), Change in working capital (ΔWC) (USD). Fill EBIT, effective tax rate (ETR) and depreciation and amortization (DA) and leave Unlevered free cash flow (UFCF) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Unlevered free cash flow (UFCF), Depreciation and amortization (DA), EBIT and Capital expenditures (CaPex) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Unlevered free cash flow (UFCF) = 100 USD. The figures come from EBIT as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Unlevered free cash flow (UFCF) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave EBIT blank and the page solves for it, reporting Unlevered free cash flow (UFCF) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Unlevered free cash flow (UFCF) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/working-capital', 'name' => 'Working capital Calculator'],
            ['path' => '/finance/working-capital-turnover-ratio', 'name' => 'Working capital turnover ratio Calculator'],
            ['path' => '/finance/year-over-year-growth', 'name' => 'Year over year growth Calculator'],
        ],
        'authors' => [],
    ],
];
