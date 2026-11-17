<?php

/**
 * MAGI
 * /finance/magi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'MAGI',
    'meta' => ['title' => 'MAGI Calculator — Free, With Worked Examples', 'description' => 'MAGI turns adjusted gross income (AGI), foreign-earned income and foreign housing cost into modified adjusted gross income (MAGI). The answer is shown in USD.', 'h1' => 'MAGI Calculator', 'updated' => '2026-02-03'],
    'sections' => [
        [
            'title' => 'Income and expenses',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'agi',
                            'label' => 'Adjusted gross income (AGI)',
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
                            'name' => 'foreign_earned_income',
                            'label' => 'Foreign-earned income',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'foreign_housing_cost',
                            'label' => 'Foreign housing cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'non_taxable_social_benefits',
                            'label' => 'Non-taxable social benefits',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'self_employment_taxes',
                            'label' => 'Self-employment taxes',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ira',
                            'label' => 'IRA contributions',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'passive_income',
                            'label' => 'Passive income or losses',
                            'type' => 'number',
                            'help' => 'Income from an enterprise in which you\'re not actively involved, like rental property or a limited partnership.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'others',
                            'label' => 'Others',
                            'type' => 'number',
                            'help' => 'For example, excluded Puerto Rico income and or American Samoa residents’ income.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Other income and expenses',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'employer_paid_adoption_benefits',
                            'label' => 'Employer-paid adoption benefits',
                            'type' => 'number',
                            'help' => 'Exclusion for adoption expenses',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'savings_bond_interest',
                            'label' => 'Savings bond interest',
                            'type' => 'number',
                            'help' => 'Exclusion for income from US savings bonds',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'student_loan_interest',
                            'label' => 'Student loan interest',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tuition_expenses',
                            'label' => 'Qualified tuition expenses and fees',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
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
                            'name' => 'magi',
                            'label' => 'Modified adjusted gross income (MAGI)',
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
            'title' => <<<'TXT'
            magi = one_way(agi + non_taxable_social_benefits + foreign_earned_income + (- foreign_housing_cost) + (self_employment_taxes/2) + ira + passive_income + tuition_expenses + student_loan_interest + employer_paid_adoption_benefits + savings_bond_interest + others)
            TXT,
            'results' => ['magi' => <<<'TXT'
            (agi + employer_paid_adoption_benefits + foreign_earned_income - foreign_housing_cost + ira + non_taxable_social_benefits + others + passive_income + savings_bond_interest + (1/2)*self_employment_taxes + student_loan_interest + tuition_expenses)
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Adjusted gross income (AGI), Foreign-earned income and Foreign housing cost into MAGI and the answer comes back as Modified adjusted gross income (MAGI). The arithmetic is the whole method: modified adjusted gross income (MAGI) is worked out from adjusted gross income (AGI) by one formula, applied once. Modified adjusted gross income (MAGI) comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the MAGI calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind MAGI: it takes 12 numbers and reports Modified adjusted gross income (MAGI).</p><p>What comes back is Modified adjusted gross income (MAGI) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 12 boxes, and nothing else.</p><ul><li><strong>Adjusted gross income (AGI)</strong> — in USD</li><li><strong>Foreign-earned income</strong> — in USD</li><li><strong>Foreign housing cost</strong> — in USD</li><li><strong>Non-taxable social benefits</strong> — in USD</li><li><strong>Self-employment taxes</strong> — in USD</li><li><strong>IRA contributions</strong> — in USD</li><li><strong>Passive income or losses</strong> — in USD. Income from an enterprise in which you&#039;re not actively involved, like rental property or a limited partnership.</li><li><strong>Others</strong> — in USD. For example, excluded Puerto Rico income and or American Samoa residents’ income.</li><li><strong>Employer-paid adoption benefits</strong> — in USD. Exclusion for adoption expenses</li><li><strong>Savings bond interest</strong> — in USD. Exclusion for income from US savings bonds</li><li><strong>Student loan interest</strong> — in USD</li><li><strong>Qualified tuition expenses and fees</strong> — in USD</li></ul><p>The result box is Modified adjusted gross income (MAGI) in USD. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Adjusted gross income (AGI) = 3 USD, Foreign-earned income = 4 USD, Foreign housing cost = 5 USD, Non-taxable social benefits = 6 USD, Self-employment taxes = 7 USD, IRA contributions = 8 USD, Passive income or losses = 9 USD, Others = 10 USD, Employer-paid adoption benefits = 2 USD, Savings bond interest = 3 USD, Student loan interest = 4 USD and Qualified tuition expenses and fees = 5 USD; the answers are <strong>Modified adjusted gross income (MAGI)</strong> = 52.5 USD.</p><ul><li><strong>Modified adjusted gross income (MAGI)</strong> = 52.5 USD</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Modified adjusted gross income (MAGI)</strong> = 52.5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Modified adjusted gross income (MAGI) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => '<p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul></ul>'],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Adjusted gross income (AGI), from 3 to 6 — and the answers go from <strong>Modified adjusted gross income (MAGI)</strong> 52.5 USD to <strong>Modified adjusted gross income (MAGI)</strong> 55.5 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Modified adjusted gross income (MAGI) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Adjusted gross income (AGI) left as a guess.</strong> Anything typed into Adjusted gross income (AGI) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Foreign-earned income left as a guess.</strong> Anything typed into Foreign-earned income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Foreign housing cost left as a guess.</strong> Anything typed into Foreign housing cost is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Adjusted gross income (AGI) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the MAGI form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Adjusted gross income (AGI)</strong> takes a plain number with no unit attached. The page reads it when it works out Modified adjusted gross income (MAGI). Fill it from a measurement rather than a memory — Adjusted gross income (AGI) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Foreign-earned income</strong> takes a plain number with no unit attached. The page reads it when it works out Modified adjusted gross income (MAGI). Fill it from a measurement rather than a memory — Foreign-earned income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Foreign housing cost</strong> takes a plain number with no unit attached. The page reads it when it works out Modified adjusted gross income (MAGI). Fill it from a measurement rather than a memory — Foreign housing cost is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Non-taxable social benefits</strong> takes a plain number with no unit attached. The page reads it when it works out Modified adjusted gross income (MAGI). Fill it from a measurement rather than a memory — Non-taxable social benefits is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Self-employment taxes</strong> takes a plain number with no unit attached. The page reads it when it works out Modified adjusted gross income (MAGI). Fill it from a measurement rather than a memory — Self-employment taxes is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>IRA contributions</strong> takes a plain number with no unit attached. The page reads it when it works out Modified adjusted gross income (MAGI). Fill it from a measurement rather than a memory — IRA contributions is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Passive income or losses</strong> takes a plain number with no unit attached. Income from an enterprise in which you&#039;re not actively involved, like rental property or a limited partnership. The page reads it when it works out Modified adjusted gross income (MAGI). Fill it from a measurement rather than a memory — Passive income or losses is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Others</strong> takes a plain number with no unit attached. For example, excluded Puerto Rico income and or American Samoa residents’ income. The page reads it when it works out Modified adjusted gross income (MAGI). Fill it from a measurement rather than a memory — Others is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Employer-paid adoption benefits</strong> takes a plain number with no unit attached. Exclusion for adoption expenses. The page reads it when it works out Modified adjusted gross income (MAGI). Fill it from a measurement rather than a memory — Employer-paid adoption benefits is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Savings bond interest</strong> takes a plain number with no unit attached. Exclusion for income from US savings bonds. The page reads it when it works out Modified adjusted gross income (MAGI). Fill it from a measurement rather than a memory — Savings bond interest is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Student loan interest</strong> takes a plain number with no unit attached. The page reads it when it works out Modified adjusted gross income (MAGI). Fill it from a measurement rather than a memory — Student loan interest is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Qualified tuition expenses and fees</strong> takes a plain number with no unit attached. The page reads it when it works out Modified adjusted gross income (MAGI). Fill it from a measurement rather than a memory — Qualified tuition expenses and fees is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Modified adjusted gross income (MAGI)</strong> is a plain number and the page's own defaults put it at 52.5. It is worked out from Adjusted gross income (AGI), Employer-paid adoption benefits, Foreign-earned income and Foreign housing cost. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Modified adjusted gross income (MAGI)</th></tr></thead><tbody><tr><td><strong>Adjusted gross income (AGI)</strong> +10%</td><td>+0.57%</td></tr><tr><td><strong>Foreign-earned income</strong> +10%</td><td>+0.76%</td></tr><tr><td><strong>Foreign housing cost</strong> +10%</td><td>-0.95%</td></tr><tr><td><strong>Non-taxable social benefits</strong> +10%</td><td>+1.14%</td></tr><tr><td><strong>Self-employment taxes</strong> +10%</td><td>+0.67%</td></tr><tr><td><strong>IRA contributions</strong> +10%</td><td>+1.52%</td></tr><tr><td><strong>Passive income or losses</strong> +10%</td><td>+1.71%</td></tr><tr><td><strong>Others</strong> +10%</td><td>+1.9%</td></tr><tr><td><strong>Employer-paid adoption benefits</strong> +10%</td><td>+0.38%</td></tr><tr><td><strong>Savings bond interest</strong> +10%</td><td>+0.57%</td></tr><tr><td><strong>Student loan interest</strong> +10%</td><td>+0.76%</td></tr><tr><td><strong>Qualified tuition expenses and fees</strong> +10%</td><td>+0.95%</td></tr></tbody></table><p>The steepest column belongs to Others: ten per cent there moves an answer by about 1.9 per cent, which is why that is the number to measure twice. By contrast, Employer-paid adoption benefits barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Adjusted gross income (AGI) = 1.5 USD, Foreign-earned income = 2 USD, Foreign housing cost = 2.5 USD, Non-taxable social benefits = 3 USD, Self-employment taxes = 3.5 USD, IRA contributions = 4 USD, Passive income or losses = 4.5 USD, Others = 5 USD, Employer-paid adoption benefits = 1 USD, Savings bond interest = 1.5 USD, Student loan interest = 2 USD and Qualified tuition expenses and fees = 2.5 USD and the page reports <strong>Modified adjusted gross income (MAGI)</strong> = 26.25 USD.</li><li>Feed in Adjusted gross income (AGI) = 9 USD, Foreign-earned income = 4 USD, Foreign housing cost = 5 USD, Non-taxable social benefits = 6 USD, Self-employment taxes = 7 USD, IRA contributions = 8 USD, Passive income or losses = 9 USD, Others = 10 USD, Employer-paid adoption benefits = 2 USD, Savings bond interest = 3 USD, Student loan interest = 4 USD and Qualified tuition expenses and fees = 5 USD and the page reports <strong>Modified adjusted gross income (MAGI)</strong> = 58.5 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Modified adjusted gross income (MAGI) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Adjusted gross income (AGI), Foreign-earned income and Foreign housing cost are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Adjusted gross income (AGI), Foreign-earned income and Foreign housing cost measured, Modified adjusted gross income (MAGI) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/earned-value-management">Earned value management Calculator</a>, <a href="/finance/earnest-money">Earnest money Calculator</a> and <a href="/finance/ebt">Earnings before tax (EBT) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the MAGI calculator work out?', 'a' => 'Modified adjusted gross income (MAGI), from Adjusted gross income (AGI), Employer-paid adoption benefits, Foreign-earned income and Foreign housing cost.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Adjusted gross income (AGI) (USD), Foreign-earned income (USD), Foreign housing cost (USD), Non-taxable social benefits (USD), Self-employment taxes (USD). With adjusted gross income (AGI), foreign-earned income and foreign housing cost in place, Modified adjusted gross income (MAGI) can stay blank and the page will work it out.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Modified adjusted gross income (MAGI) = 52.5 USD. That comes from the page's own defaults, entered in Adjusted gross income (AGI); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Modified adjusted gross income (MAGI) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The page needs every box filled: Modified adjusted gross income (MAGI) is fixed as the value it works out, so there is nothing to solve for when an input is missing.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Modified adjusted gross income (MAGI) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/earned-value-management', 'name' => 'Earned value management Calculator'],
            ['path' => '/finance/earnest-money', 'name' => 'Earnest money Calculator'],
            ['path' => '/finance/ebt', 'name' => 'Earnings before tax (EBT) Calculator'],
        ],
        'authors' => [],
    ],
];
