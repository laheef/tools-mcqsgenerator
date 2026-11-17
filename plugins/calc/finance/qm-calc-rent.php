<?php

/**
 * Rent
 * /finance/rent
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rent',
    'meta' => ['title' => 'Rent Calculator — Free, With Worked Examples', 'description' => 'Rent works out monthly income from monthly savings and monthly debt payments. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Rent Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => 'Affordable rent',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_income',
                            'label' => 'Monthly income',
                            'type' => 'number',
                            'help' => 'How much you earn each month?',
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
                            'name' => 'monthly_savings',
                            'label' => 'Monthly savings',
                            'type' => 'number',
                            'help' => 'How much you save each month?',
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
                            'name' => 'monthly_debt',
                            'label' => 'Monthly debt payments',
                            'type' => 'number',
                            'help' => 'How much goes towards paying off a debt or loan?',
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
                            'name' => 'monthly_expenses',
                            'label' => 'Monthly expenses',
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
                            'name' => 'affordable_rent',
                            'label' => 'Affordable rent',
                            'type' => 'number',
                            'help' => 'Recommended amount that should go towards your rent.',
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
            'title' => 'Rent-to-income ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income',
                            'label' => 'Monthly income',
                            'type' => 'number',
                            'help' => 'How much you earn each month?',
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
                            'name' => 'mothly_rent',
                            'label' => 'Monthly rent',
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
                            'name' => 'rent_to_income_ratio',
                            'label' => 'Rent-to-income ratio',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'required_annual_gross_income',
                            'label' => 'Required annual gross income',
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
            'title' => 'affordable_rent = monthly_income - (monthly_debt + monthly_savings + monthly_expenses)',
            'results' => [
                'monthly_expenses' => '-affordable_rent - monthly_debt + monthly_income - monthly_savings',
                'monthly_income' => 'affordable_rent + monthly_debt + monthly_expenses + monthly_savings',
                'affordable_rent' => '-monthly_debt - monthly_expenses + monthly_income - monthly_savings',
                'monthly_debt' => '-affordable_rent - monthly_expenses + monthly_income - monthly_savings',
                'monthly_savings' => '-affordable_rent - monthly_debt - monthly_expenses + monthly_income',
            ],
        ],
        [
            'title' => 'required_annual_gross_income = mothly_rent * 40',
            'results' => ['required_annual_gross_income' => '40*mothly_rent', 'mothly_rent' => '(1/40)*required_annual_gross_income'],
        ],
        [
            'title' => 'rent_to_income_ratio = mothly_rent / income',
            'results' => ['income' => 'mothly_rent/rent_to_income_ratio', 'rent_to_income_ratio' => 'mothly_rent/income', 'mothly_rent' => 'income*rent_to_income_ratio'],
        ],
        [
            'title' => 'monthly_income = income',
            'results' => ['monthly_income' => 'income', 'income' => 'monthly_income'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Monthly savings, Monthly debt payments and Monthly expenses into Rent and the answer comes back as Affordable rent and Monthly income. Nothing is looked up on this page: affordable rent is computed from monthly savings and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Affordable rent is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Rent calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Rent: it takes 4 numbers and reports Affordable rent, Monthly income and Monthly rent.</p><p>The relationship it solves reads Affordable rent = − Monthly debt payments − Monthly expenses + Monthly income − Monthly savings.</p><p>The result panel carries Affordable rent, Monthly income, Monthly rent and Rent-to-income ratio, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Monthly income</strong> — in USD. How much you earn each month?</li><li><strong>Monthly savings</strong> — in USD. How much you save each month?</li><li><strong>Monthly debt payments</strong> — in USD. How much goes towards paying off a debt or loan?</li><li><strong>Monthly expenses</strong> — in USD</li></ul><p>What you get back is Affordable rent in USD, Monthly income in USD, Monthly rent in USD, Rent-to-income ratio in percent, Required annual gross income in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Monthly savings = 10 USD, Monthly debt payments = 100 USD, Monthly expenses = 1000 USD, Affordable rent = 10 USD, Monthly income = 100 USD, Monthly rent = 1000 USD, Rent-to-income ratio = 10 perc and Required annual gross income = 100 USD gives <strong>Monthly income</strong> = 1120 USD.</p><ul><li><strong>Monthly income</strong> = 1120 USD</li></ul><p>The line behind those figures is <strong>Affordable rent</strong> = <code>− Monthly debt payments − Monthly expenses + Monthly income − Monthly savings</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Monthly income</strong> = 1120. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Rent-to-income ratio lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Affordable rent</strong> = <code>− Monthly debt payments − Monthly expenses + Monthly income − Monthly savings</code></li><li><strong>Monthly expenses</strong> = <code>− Affordable rent − Monthly debt payments + Monthly income − Monthly savings</code></li><li><strong>Monthly income</strong> = <code>Affordable rent + Monthly debt payments + Monthly expenses + Monthly savings</code></li><li><strong>Monthly debt payments</strong> = <code>− Affordable rent − Monthly expenses + Monthly income − Monthly savings</code></li><li><strong>Monthly savings</strong> = <code>− Affordable rent − Monthly debt payments − Monthly expenses + Monthly income</code></li><li><strong>Required annual gross income</strong> = <code>40 × Monthly rent</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Affordable rent</strong> = <code>− Monthly debt payments − Monthly expenses + Monthly income − Monthly savings</code> — the form to use when Monthly debt payments, Monthly expenses, Monthly income and Monthly savings are the values you have.</li><li><strong>Monthly expenses</strong> = <code>− Affordable rent − Monthly debt payments + Monthly income − Monthly savings</code> — the form to use when Affordable rent, Monthly debt payments, Monthly income and Monthly savings are the values you have.</li><li><strong>Monthly income</strong> = <code>Affordable rent + Monthly debt payments + Monthly expenses + Monthly savings</code> — the form to use when Affordable rent, Monthly debt payments, Monthly expenses and Monthly savings are the values you have.</li><li><strong>Monthly debt payments</strong> = <code>− Affordable rent − Monthly expenses + Monthly income − Monthly savings</code> — the form to use when Affordable rent, Monthly expenses, Monthly income and Monthly savings are the values you have.</li><li><strong>Monthly savings</strong> = <code>− Affordable rent − Monthly debt payments − Monthly expenses + Monthly income</code> — the form to use when Affordable rent, Monthly debt payments, Monthly expenses and Monthly income are the values you have.</li><li><strong>Required annual gross income</strong> = <code>40 × Monthly rent</code> — the form to use when Monthly rent are the values you have.</li><li><strong>Monthly rent</strong> = <code>(1 ÷ 40) × Required annual gross income</code> — the form to use when Required annual gross income are the values you have.</li><li><strong>Rent-to-income ratio</strong> = <code>Monthly rent ÷ Monthly income</code> — the form to use when Monthly rent and Monthly income are the values you have.</li></ul><p>Any one of Affordable rent, Monthly expenses and Monthly income can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Monthly savings, from 10 to 20 — and the answers go from <strong>Monthly income</strong> 1120 USD to <strong>Monthly income</strong> 1130 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Affordable rent, Monthly income and Monthly rent are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Monthly income left as a guess.</strong> Anything typed into Monthly income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Monthly savings left as a guess.</strong> Anything typed into Monthly savings is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Monthly debt payments left as a guess.</strong> Anything typed into Monthly debt payments is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Monthly income is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Monthly income</strong> takes a plain number with no unit attached. How much you earn each month?. The page reads it when it works out Monthly expenses, Affordable rent and Monthly debt payments. Have it to hand before you start: Monthly income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Monthly savings</strong> takes a plain number with no unit attached. How much you save each month?. The page reads it when it works out Monthly expenses, Monthly income and Affordable rent. Have it to hand before you start: Monthly savings is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Monthly debt payments</strong> takes a plain number with no unit attached. How much goes towards paying off a debt or loan?. The page reads it when it works out Monthly expenses, Monthly income and Affordable rent. Have it to hand before you start: Monthly debt payments is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Monthly expenses</strong> takes a plain number with no unit attached. The page reads it when it works out Monthly income, Affordable rent and Monthly debt payments. Have it to hand before you start: Monthly expenses is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Affordable rent</strong> is a plain number. It is worked out from Monthly debt payments, Monthly expenses, Monthly income and Monthly savings. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly income</strong> is a plain number. It is worked out from Monthly rent and Rent-to-income ratio. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly rent</strong> is a plain number. It is worked out from Required annual gross income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Rent-to-income ratio</strong> is a percent figure. It is worked out from Monthly rent and Monthly income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Required annual gross income</strong> is a plain number. It is worked out from Monthly rent. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Monthly income</th></tr></thead><tbody><tr><td><strong>Monthly savings</strong> +10%</td><td>+0.09%</td></tr><tr><td><strong>Monthly debt payments</strong> +10%</td><td>+0.89%</td></tr><tr><td><strong>Monthly expenses</strong> +10%</td><td>+8.93%</td></tr><tr><td><strong>Affordable rent</strong> +10%</td><td>+0.09%</td></tr><tr><td><strong>Monthly income</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Monthly rent</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Rent-to-income ratio</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Required annual gross income</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Monthly expenses: ten per cent there moves an answer by about 8.9 per cent, which is why that is the number to measure twice. By contrast, Monthly savings, Affordable rent and Monthly income barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Affordable rent is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Monthly income, Monthly savings and Monthly debt payments are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Monthly income, Monthly savings and Monthly debt payments measured, Affordable rent and Monthly income wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/eoq">Economic order quantity (EOQ) Calculator</a>, <a href="/finance/economic-profit">Economic profit Calculator</a> and <a href="/finance/economic-value-added">Economic value added Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rent calculator work out?', 'a' => <<<'TXT'
            Affordable rent, Monthly income, Monthly rent and Rent-to-income ratio, from Monthly debt payments, Monthly expenses, Monthly income and Monthly savings. The relationship is Affordable rent = − Monthly debt payments − Monthly expenses + Monthly income − Monthly savings.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Monthly income (USD), Monthly savings (USD), Monthly debt payments (USD), Monthly expenses (USD). With monthly income, monthly savings and monthly debt payments in place, Affordable rent can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Affordable rent, Monthly expenses, Monthly income and Monthly debt payments blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Monthly income = 1120 USD. That comes from the page\'s own defaults, entered in Monthly income; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Affordable rent is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Monthly income left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Affordable rent at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/eoq', 'name' => 'Economic order quantity (EOQ) Calculator'],
            ['path' => '/finance/economic-profit', 'name' => 'Economic profit Calculator'],
            ['path' => '/finance/economic-value-added', 'name' => 'Economic value added Calculator'],
        ],
        'authors' => [],
    ],
];
