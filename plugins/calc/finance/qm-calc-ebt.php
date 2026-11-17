<?php

/**
 * Earnings before tax (EBT)
 * /finance/ebt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Earnings before tax (EBT)',
    'meta' => ['title' => 'Earnings before tax (EBT) — Formula & Results', 'description' => 'Enter revenue, Cost of goods sold (COGS) and SG&A and Earnings before tax (EBT) returns gross profit and operating expense. Any box can be the unknown.', 'h1' => 'Earnings before tax (EBT) Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Gross profit',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue',
                            'label' => 'Revenue',
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
                            'name' => 'cogs',
                            'label' => 'Cost of goods sold (COGS)',
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
                            'name' => 'gross_profit',
                            'label' => 'Gross profit',
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
            'title' => 'Operating expenses',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sga',
                            'label' => 'SG&A',
                            'type' => 'number',
                            'help' => 'Selling, general, and administrative expenses',
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
                            'name' => 'depreciation_amortization',
                            'label' => 'Depreciation and amortization (D&A)',
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
                            'name' => 'operating_expense',
                            'label' => 'Operating expense',
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
            'title' => 'Other',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_expense',
                            'label' => 'Interest expense',
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
                            'name' => 'other_income',
                            'label' => 'Other income',
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
            'title' => 'EBT',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ebt',
                            'label' => 'Earnings before tax (EBT)',
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
            'title' => 'gross_profit = revenue - cogs',
            'results' => ['gross_profit' => '-cogs + revenue', 'cogs' => '-gross_profit + revenue', 'revenue' => 'cogs + gross_profit'],
        ],
        [
            'title' => 'operating_expense = sga + depreciation_amortization',
            'results' => ['depreciation_amortization' => 'operating_expense - sga', 'sga' => '-depreciation_amortization + operating_expense', 'operating_expense' => 'depreciation_amortization + sga'],
        ],
        [
            'title' => 'ebt = gross_profit - operating_expense - interest_expense + other_income',
            'results' => [
                'ebt' => 'gross_profit - interest_expense - operating_expense + other_income',
                'gross_profit' => 'ebt + interest_expense + operating_expense - other_income',
                'operating_expense' => '-ebt + gross_profit - interest_expense + other_income',
                'interest_expense' => '-ebt + gross_profit - operating_expense + other_income',
                'other_income' => 'ebt - gross_profit + interest_expense + operating_expense',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Earnings before tax (EBT) works out Gross profit and SG&A from Revenue and Cost of goods sold (COGS). Nothing is looked up on this page: gross profit is computed from revenue and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Gross profit is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Earnings before tax (EBT) calculator works', 'html' => <<<'TXT'
            <p>Earnings before tax (EBT) answers one question from 2 numbers, and the answer is Gross profit, SG&amp;A and Depreciation and amortization (D&amp;A).</p><p>The relationship it solves reads Gross profit = − Cost of goods sold (COGS) + Revenue.</p><p>The result panel carries Gross profit, SG&amp;A, Depreciation and amortization (D&amp;A) and Operating expense, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Revenue</strong> — in USD</li><li><strong>Cost of goods sold (COGS)</strong> — in USD</li></ul><p>The result boxes are Gross profit in USD, SG&amp;A in USD, Depreciation and amortization (D&amp;A) in USD, Operating expense in USD, Interest expense in USD, Other income in USD, Earnings before tax (EBT) in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Revenue = 10 USD, Cost of goods sold (COGS) = 100 USD, SG&amp;amp;A = 1000 USD, Depreciation and amortization (D&amp;amp;A) = 10 USD, Operating expense = 100 USD, Interest expense = 1000 USD, Other income = 10 USD and Earnings before tax (EBT) = 100 USD; the answers are <strong>Gross profit</strong> = -90 USD.</p><ul><li><strong>Gross profit</strong> = -90 USD</li></ul><p>The line behind those figures is <strong>Gross profit</strong> = <code>− Cost of goods sold (COGS) + Revenue</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Gross profit</strong> = -90. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Gross profit is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Gross profit</strong> = <code>− Cost of goods sold (COGS) + Revenue</code></li><li><strong>Cost of goods sold (COGS)</strong> = <code>− Gross profit + Revenue</code></li><li><strong>Revenue</strong> = <code>Cost of goods sold (COGS) + Gross profit</code></li><li><strong>Operating expense</strong> = <code>Depreciation and amortization (D&amp;A) + SG&amp;A</code></li><li><strong>Depreciation and amortization (D&amp;A)</strong> = <code>Operating expense − SG&amp;A</code></li><li><strong>SG&amp;A</strong> = <code>− Depreciation and amortization (D&amp;A) + Operating expense</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Gross profit</strong> = <code>− Cost of goods sold (COGS) + Revenue</code> — the form to use when Cost of goods sold (COGS) and Revenue are the values you have.</li><li><strong>Cost of goods sold (COGS)</strong> = <code>− Gross profit + Revenue</code> — the form to use when Gross profit and Revenue are the values you have.</li><li><strong>Revenue</strong> = <code>Cost of goods sold (COGS) + Gross profit</code> — the form to use when Cost of goods sold (COGS) and Gross profit are the values you have.</li><li><strong>Operating expense</strong> = <code>Depreciation and amortization (D&amp;A) + SG&amp;A</code> — the form to use when Depreciation and amortization (D&amp;A) and SG&amp;A are the values you have.</li><li><strong>Depreciation and amortization (D&amp;A)</strong> = <code>Operating expense − SG&amp;A</code> — the form to use when Operating expense and SG&amp;A are the values you have.</li><li><strong>SG&amp;A</strong> = <code>− Depreciation and amortization (D&amp;A) + Operating expense</code> — the form to use when Depreciation and amortization (D&amp;A) and Operating expense are the values you have.</li><li><strong>Earnings before tax (EBT)</strong> = <code>Gross profit − Interest expense − Operating expense + Other income</code> — the form to use when Gross profit, Interest expense, Operating expense and Other income are the values you have.</li><li><strong>Gross profit</strong> = <code>Earnings before tax (EBT) + Interest expense + Operating expense − Other income</code> — the form to use when Earnings before tax (EBT), Interest expense, Operating expense and Other income are the values you have.</li></ul><p>Any one of Gross profit, Cost of goods sold (COGS) and Revenue can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Revenue, from 10 to 20 — and the answers go from <strong>Gross profit</strong> -90 USD to <strong>Gross profit</strong> -80 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Gross profit, SG&amp;A and Depreciation and amortization (D&amp;A) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Revenue left as a guess.</strong> Anything typed into Revenue is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Cost of goods sold (COGS) left as a guess.</strong> Anything typed into Cost of goods sold (COGS) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Revenue to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Earnings before tax (EBT) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Revenue</strong> takes a plain number with no unit attached. It feeds Gross profit and Cost of goods sold (COGS). Fill it from a measurement rather than a memory — Revenue is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost of goods sold (COGS)</strong> takes a plain number with no unit attached. It feeds Gross profit and Revenue. Fill it from a measurement rather than a memory — Cost of goods sold (COGS) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Gross profit</strong> is a plain number and the page's own defaults put it at -90. It is worked out from Cost of goods sold (COGS) and Revenue. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>SG&amp;A</strong> is a plain number. It is worked out from Depreciation and amortization (D&A) and Operating expense. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Depreciation and amortization (D&amp;A)</strong> is a plain number. It is worked out from Operating expense and SG&A. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Operating expense</strong> is a plain number. It is worked out from Depreciation and amortization (D&A) and SG&A. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Interest expense</strong> is a plain number. It is worked out from Earnings before tax (EBT), Gross profit, Operating expense and Other income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Other income</strong> is a plain number. It is worked out from Earnings before tax (EBT), Gross profit, Interest expense and Operating expense. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Earnings before tax (EBT)</strong> is a plain number. It is worked out from Gross profit, Interest expense, Operating expense and Other income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Gross profit</th></tr></thead><tbody><tr><td><strong>Revenue</strong> +10%</td><td>+1.11%</td></tr><tr><td><strong>Cost of goods sold (COGS)</strong> +10%</td><td>-11.11%</td></tr><tr><td><strong>SG&amp;A</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Depreciation and amortization (D&amp;A)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Operating expense</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Interest expense</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Other income</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Earnings before tax (EBT)</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Cost of goods sold (COGS): ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. By contrast, SG&amp;A, Depreciation and amortization (D&amp;A) and Operating expense barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Revenue = 5 USD, Cost of goods sold (COGS) = 50 USD, SG&amp;A = 500 USD, Depreciation and amortization (D&amp;A) = 5 USD, Operating expense = 50 USD, Interest expense = 500 USD, Other income = 5 USD and Earnings before tax (EBT) = 50 USD and the page reports <strong>Gross profit</strong> = -45 USD.</li><li>Feed in Revenue = 30 USD, Cost of goods sold (COGS) = 100 USD, SG&amp;A = 1000 USD, Depreciation and amortization (D&amp;A) = 10 USD, Operating expense = 100 USD, Interest expense = 1000 USD, Other income = 10 USD and Earnings before tax (EBT) = 100 USD and the page reports <strong>Gross profit</strong> = -70 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Gross profit is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Revenue and Cost of goods sold (COGS) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Revenue and Cost of goods sold (COGS) measured, Gross profit and SG&amp;A wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/sdlt-uk">Stamp Duty Land Tax (SDLT) Calculator</a>, <a href="/finance/state-tax">State tax Calculator</a> and <a href="/finance/stimulus-check-40k-cap">Stimulus check (40k cap) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Earnings before tax (EBT) calculator work out?', 'a' => <<<'TXT'
            Gross profit, SG&A, Depreciation and amortization (D&A) and Operating expense, from Cost of goods sold (COGS) and Revenue. The relationship is Gross profit = − Cost of goods sold (COGS) + Revenue.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Revenue (USD), Cost of goods sold (COGS) (USD). Fill revenue and cost of goods sold (COGS) and leave Gross profit empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Gross profit, Cost of goods sold (COGS), Revenue and Operating expense blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Gross profit = -90 USD. That comes from the page\'s own defaults, entered in Revenue; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Gross profit is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Revenue blank and the page solves for it, reporting Gross profit instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Gross profit at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/sdlt-uk', 'name' => 'Stamp Duty Land Tax (SDLT) Calculator'],
            ['path' => '/finance/state-tax', 'name' => 'State tax Calculator'],
            ['path' => '/finance/stimulus-check-40k-cap', 'name' => 'Stimulus check (40k cap) Calculator'],
        ],
        'authors' => [],
    ],
];
