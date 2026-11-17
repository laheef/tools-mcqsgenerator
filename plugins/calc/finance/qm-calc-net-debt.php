<?php

/**
 * Net debt
 * /finance/net-debt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net debt',
    'meta' => ['title' => 'Net debt Calculator — Formula, Units & Example', 'description' => 'Net debt turns cash and cash equivalents into cash and cash equivalents and short-term debt. Every box can be solved for, not only the one in the title.', 'h1' => 'Net debt Calculator', 'updated' => '2024-05-31'],
    'sections' => [
        [
            'title' => 'Cash and cash equivalents',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash',
                            'label' => 'Cash',
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
                            'name' => 'cashEq',
                            'label' => 'Cash equivalents',
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
                            'name' => 'cash_cashEq2',
                            'label' => 'Cash and cash equivalents',
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
            'title' => 'Short-term debt',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'accounts_payable',
                            'label' => 'Accounts payable',
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
                            'name' => 'current_long_term_debt',
                            'label' => 'Current portion of the long term debt',
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
                            'name' => 'current_leases',
                            'label' => 'Current part of leases',
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
                            'name' => 'other_current_payable',
                            'label' => 'Other payables or accrued items',
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
                            'name' => 'short_term_debt2',
                            'label' => 'Short-term debt',
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
            'title' => 'Long-term debt',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'non_current_long_term_debt',
                            'label' => 'Non-current long term debt',
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
                            'name' => 'non_current_leases',
                            'label' => 'Non-current part of leases',
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
                            'name' => 'other_non_current_payable',
                            'label' => 'Other payables or accrued items',
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
                            'name' => 'long_term_debt2',
                            'label' => 'Long-term debt',
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
            'title' => 'Net debt',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cash_cashEq',
                            'label' => 'Cash and cash equivalents',
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
                            'name' => 'short_term_debt',
                            'label' => 'Short-term debt',
                            'type' => 'number',
                            'help' => 'Also known as current liabilities.',
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
                            'name' => 'long_term_debt',
                            'label' => 'Long-term debt',
                            'type' => 'number',
                            'help' => 'Also known as non-current liabilities.',
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
                            'name' => 'net_debt',
                            'label' => 'Net debt',
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
            'title' => 'net_debt = short_term_debt+long_term_debt-(cash_cashEq)',
            'results' => ['long_term_debt' => 'cash_cashEq + net_debt - short_term_debt', 'short_term_debt' => 'cash_cashEq - long_term_debt + net_debt', 'cash_cashEq' => 'long_term_debt - net_debt + short_term_debt', 'net_debt' => '-cash_cashEq + long_term_debt + short_term_debt'],
        ],
        [
            'title' => 'cash_cashEq = cash + cashEq',
            'results' => ['cashEq' => '-cash + cash_cashEq', 'cash' => '-cashEq + cash_cashEq', 'cash_cashEq' => 'cash + cashEq'],
        ],
        [
            'title' => 'short_term_debt=current_long_term_debt+accounts_payable+current_leases+other_current_payable',
            'results' => [
                'current_leases' => '-accounts_payable - current_long_term_debt - other_current_payable + short_term_debt',
                'accounts_payable' => '-current_leases - current_long_term_debt - other_current_payable + short_term_debt',
                'short_term_debt' => 'accounts_payable + current_leases + current_long_term_debt + other_current_payable',
                'current_long_term_debt' => '-accounts_payable - current_leases - other_current_payable + short_term_debt',
                'other_current_payable' => '-accounts_payable - current_leases - current_long_term_debt + short_term_debt',
            ],
        ],
        [
            'title' => 'long_term_debt=non_current_long_term_debt+non_current_leases+other_non_current_payable',
            'results' => ['non_current_leases' => 'long_term_debt - non_current_long_term_debt - other_non_current_payable', 'other_non_current_payable' => 'long_term_debt - non_current_leases - non_current_long_term_debt', 'non_current_long_term_debt' => 'long_term_debt - non_current_leases - other_non_current_payable', 'long_term_debt' => 'non_current_leases + non_current_long_term_debt + other_non_current_payable'],
        ],
        [
            'title' => 'long_term_debt2 = long_term_debt',
            'results' => ['long_term_debt' => 'long_term_debt2', 'long_term_debt2' => 'long_term_debt'],
        ],
        [
            'title' => 'short_term_debt2 = short_term_debt',
            'results' => ['short_term_debt2' => 'short_term_debt', 'short_term_debt' => 'short_term_debt2'],
        ],
        [
            'title' => 'cash_cashEq2 = cash_cashEq',
            'results' => ['cash_cashEq2' => 'cash_cashEq', 'cash_cashEq' => 'cash_cashEq2'],
        ],
    ],
    'article' => [
        'intro' => 'Net debt works in both directions, between cash and cash equivalents. Units for Cash default to USD and can be changed on the answer itself.',
        'sections' => [
            ['title' => 'How the Net debt calculator works', 'html' => <<<'TXT'
            <p>Net debt answers one question from 3 numbers, and the answer is Cash, Cash equivalents and Cash and cash equivalents.</p><p>Written with the labels from the form, Net debt = − Cash and cash equivalents + Long-term debt + Short-term debt.</p><p>What comes back is Cash, Cash equivalents, Cash and cash equivalents and Accounts payable — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Cash and cash equivalents</strong> — in USD</li><li><strong>Short-term debt</strong> — in USD. Also known as current liabilities.</li><li><strong>Long-term debt</strong> — in USD. Also known as non-current liabilities.</li></ul><p>What you get back is Cash in USD, Cash equivalents in USD, Cash and cash equivalents in USD, Accounts payable in USD, Current portion of the long term debt in USD, Current part of leases in USD, Other payables or accrued items in USD, Short-term debt in USD, Non-current long term debt in USD, Non-current part of leases in USD, Other payables or accrued items in USD, Long-term debt in USD, Net debt in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cash = 10 USD, Cash equivalents = 100 USD, Cash and cash equivalents = 1000 USD, Accounts payable = 10 USD, Current portion of the long term debt = 100 USD, Current part of leases = 1000 USD, Other payables or accrued items = 10 USD, Short-term debt = 100 USD, Non-current long term debt = 1000 USD, Non-current part of leases = 10 USD, Other payables or accrued items = 100 USD, Long-term debt = 1000 USD, Cash and cash equivalents = 10 USD, Short-term debt = 100 USD and Net debt = 1000 USD gives <strong>Long-term debt</strong> = 910 USD.</p><ul><li><strong>Long-term debt</strong> = 910 USD</li></ul><p>The line behind those figures is <strong>Net debt</strong> = <code>− Cash and cash equivalents + Long-term debt + Short-term debt</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Long-term debt</strong> = 910. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Cash is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Net debt</strong> = <code>− Cash and cash equivalents + Long-term debt + Short-term debt</code></li><li><strong>Long-term debt</strong> = <code>Cash and cash equivalents + Net debt − Short-term debt</code></li><li><strong>Short-term debt</strong> = <code>Cash and cash equivalents − Long-term debt + Net debt</code></li><li><strong>Cash and cash equivalents</strong> = <code>Long-term debt − Net debt + Short-term debt</code></li><li><strong>Cash equivalents</strong> = <code>− Cash + Cash and cash equivalents</code></li><li><strong>Cash</strong> = <code>− Cash equivalents + Cash and cash equivalents</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Net debt</strong> = <code>− Cash and cash equivalents + Long-term debt + Short-term debt</code> — the form to use when Cash and cash equivalents, Long-term debt and Short-term debt are the values you have.</li><li><strong>Long-term debt</strong> = <code>Cash and cash equivalents + Net debt − Short-term debt</code> — the form to use when Cash and cash equivalents, Net debt and Short-term debt are the values you have.</li><li><strong>Short-term debt</strong> = <code>Cash and cash equivalents − Long-term debt + Net debt</code> — the form to use when Cash and cash equivalents, Long-term debt and Net debt are the values you have.</li><li><strong>Cash and cash equivalents</strong> = <code>Long-term debt − Net debt + Short-term debt</code> — the form to use when Long-term debt, Net debt and Short-term debt are the values you have.</li><li><strong>Cash and cash equivalents</strong> = <code>Cash + Cash equivalents</code> — the form to use when Cash and Cash equivalents are the values you have.</li><li><strong>Cash equivalents</strong> = <code>− Cash + Cash and cash equivalents</code> — the form to use when Cash and Cash and cash equivalents are the values you have.</li><li><strong>Cash</strong> = <code>− Cash equivalents + Cash and cash equivalents</code> — the form to use when Cash equivalents and Cash and cash equivalents are the values you have.</li><li><strong>Short-term debt</strong> = <code>Accounts payable + Current part of leases + Current portion of the long term debt + Other payables or accrued items</code> — the form to use when Accounts payable, Current part of leases, Current portion of the long term debt and Other payables or accrued items are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Net debt, Long-term debt and Short-term debt can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Cash from 10 to 20, leaving every other box alone. The panel moves from <strong>Long-term debt</strong> 910 USD to <strong>Long-term debt</strong> 910 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cash, Cash equivalents and Cash and cash equivalents are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cash and cash equivalents left as a guess.</strong> Anything typed into Cash and cash equivalents is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Short-term debt left as a guess.</strong> Anything typed into Short-term debt is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Long-term debt left as a guess.</strong> Anything typed into Long-term debt is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Cash and cash equivalents to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Net debt form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Cash and cash equivalents</strong> takes a plain number with no unit attached. It feeds Long-term debt, Short-term debt and Net debt. Fill it from a measurement rather than a memory — Cash and cash equivalents is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Short-term debt</strong> takes a plain number with no unit attached. Also known as current liabilities. It feeds Long-term debt, Cash and cash equivalents and Net debt. Fill it from a measurement rather than a memory — Short-term debt is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Long-term debt</strong> takes a plain number with no unit attached. Also known as non-current liabilities. It feeds Short-term debt, Cash and cash equivalents and Net debt. Fill it from a measurement rather than a memory — Long-term debt is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Cash and cash equivalents, Short-term debt and Long-term debt ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Cash and cash equivalents — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Cash in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cash is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cash and cash equivalents, Short-term debt and Long-term debt are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cash and cash equivalents, Short-term debt and Long-term debt and the number you are missing is Cash and Cash equivalents.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/mortgage">Mortgage Calculator</a>, <a href="/finance/mortgage-interest">Mortgage interest</a> and <a href="/finance/mortgage-payoff">Mortgage payoff Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Net debt is a number to act on, so the useful question is what to do with Cash (USD), Cash equivalents (USD) and Cash and cash equivalents (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Cash and cash equivalents, Short-term debt and Long-term debt alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net debt calculator work out?', 'a' => <<<'TXT'
            Cash, Cash equivalents, Cash and cash equivalents and Accounts payable, from Cash and cash equivalents, Long-term debt and Short-term debt. The relationship is Net debt = − Cash and cash equivalents + Long-term debt + Short-term debt.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cash and cash equivalents (USD), Short-term debt (USD), Long-term debt (USD). With cash and cash equivalents, short-term debt and long-term debt in place, Cash can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Net debt, Long-term debt, Short-term debt and Cash and cash equivalents can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Long-term debt = 910 USD. The figures come from Cash and cash equivalents as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Cash is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cash and cash equivalents blank and the page solves for it, reporting Cash instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cash keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/mortgage', 'name' => 'Mortgage Calculator'],
            ['path' => '/finance/mortgage-interest', 'name' => 'Mortgage interest'],
            ['path' => '/finance/mortgage-payoff', 'name' => 'Mortgage payoff Calculator'],
        ],
        'authors' => [],
    ],
];
