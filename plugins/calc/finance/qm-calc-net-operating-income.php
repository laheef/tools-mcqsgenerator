<?php

/**
 * Net operating income
 * /finance/net-operating-income
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net operating income',
    'meta' => ['title' => 'Net operating income Calculator: Free, With Steps', 'description' => 'Net operating income works out potential gross income from area and rental per area. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Net operating income Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => 'Potential gross income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rental_per_sq_area',
                            'label' => 'Rental per area',
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
                            'help' => 'Income other than rental.',
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
                            'name' => 'potential_gross_income',
                            'label' => 'Potential gross income',
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
            'title' => 'Effective gross income&nbsp;',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'occupancy_rate',
                            'label' => 'Occupancy rate',
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
                            'name' => 'vacancy_loss',
                            'label' => 'Vacancy loss',
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
                            'name' => 'effective_gross_income',
                            'label' => 'Effective gross income',
                            'type' => 'number',
                            'help' => 'The income from the property after deducting vacancy loss.',
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
            'title' => 'Operating expenses breakdown',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'property_tax',
                            'label' => 'Property taxes',
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
                            'name' => 'property_management_fees',
                            'label' => 'Property management fees',
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
                            'name' => 'insurance',
                            'label' => 'Insurance',
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
                            'name' => 'maintenance',
                            'label' => 'Maintenance',
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
                            'name' => 'repair',
                            'label' => 'Repair',
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
                            'name' => 'other_operating_expenses',
                            'label' => 'Other operating expenses',
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
            'title' => 'Total operating expenses',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'operating_expenses',
                            'label' => 'Operating expenses',
                            'type' => 'number',
                            'help' => 'Open up the above section of the calculator to specify expenses in more detail.',
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
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_operating_income',
                            'label' => 'Net operating income (NOI)',
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
            'title' => 'potential_gross_income = (area * rental_per_sq_area) + other_income',
            'results' => ['potential_gross_income' => 'area*rental_per_sq_area + other_income', 'rental_per_sq_area' => '(-other_income + potential_gross_income)/area', 'area' => '(-other_income + potential_gross_income)/rental_per_sq_area', 'other_income' => '-area*rental_per_sq_area + potential_gross_income'],
        ],
        [
            'title' => 'vacancy_loss = (area * rental_per_sq_area) * (1 - occupancy_rate)',
            'results' => ['occupancy_rate' => '1 - vacancy_loss/(area*rental_per_sq_area)', 'rental_per_sq_area' => '-vacancy_loss/(area*(occupancy_rate - 1))', 'vacancy_loss' => 'area*rental_per_sq_area*(1 - occupancy_rate)', 'area' => '-vacancy_loss/(rental_per_sq_area*(occupancy_rate - 1))'],
        ],
        [
            'title' => 'effective_gross_income = potential_gross_income - vacancy_loss',
            'results' => ['potential_gross_income' => 'effective_gross_income + vacancy_loss', 'vacancy_loss' => '-effective_gross_income + potential_gross_income', 'effective_gross_income' => 'potential_gross_income - vacancy_loss'],
        ],
        [
            'title' => 'operating_expenses = property_tax + property_management_fees + insurance + repair + maintenance + other_operating_expenses',
            'results' => [
                'maintenance' => '-insurance + operating_expenses - other_operating_expenses - property_management_fees - property_tax - repair',
                'property_tax' => '-insurance - maintenance + operating_expenses - other_operating_expenses - property_management_fees - repair',
                'operating_expenses' => 'insurance + maintenance + other_operating_expenses + property_management_fees + property_tax + repair',
                'insurance' => '-maintenance + operating_expenses - other_operating_expenses - property_management_fees - property_tax - repair',
                'repair' => '-insurance - maintenance + operating_expenses - other_operating_expenses - property_management_fees - property_tax',
                'property_management_fees' => '-insurance - maintenance + operating_expenses - other_operating_expenses - property_tax - repair',
                'other_operating_expenses' => '-insurance - maintenance + operating_expenses - property_management_fees - property_tax - repair',
            ],
        ],
        [
            'title' => 'net_operating_income = effective_gross_income - operating_expenses',
            'results' => ['effective_gross_income' => 'net_operating_income + operating_expenses', 'net_operating_income' => 'effective_gross_income - operating_expenses', 'operating_expenses' => 'effective_gross_income - net_operating_income'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Net operating income turns Area, Rental per area and Other income into Potential gross income and Occupancy rate. The arithmetic is the whole method: potential gross income is worked out from area by one formula, applied once. Potential gross income comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Net operating income calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Net operating income: it takes 3 numbers and reports Potential gross income, Occupancy rate and Vacancy loss.</p><p>The relationship it solves reads Potential gross income = Area × Rental per area + Other income.</p><p>The result panel carries Potential gross income, Occupancy rate, Vacancy loss and Effective gross income, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Area</strong> — in square meters</li><li><strong>Rental per area</strong> — in USD</li><li><strong>Other income</strong> — in USD. Income other than rental.</li></ul><p>The answers come back as Potential gross income in USD, Occupancy rate in percent, Vacancy loss in USD, Effective gross income in USD, Property taxes in USD, Property management fees in USD, Insurance in USD, Maintenance in USD, Repair in USD, Other operating expenses in USD, Operating expenses in USD, Net operating income (NOI) in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Area = 10 m2, Rental per area = 100 USD, Other income = 1000 USD, Occupancy rate = 10 perc, Vacancy loss = 100 USD, Effective gross income = 1000 USD, Property taxes = 10 USD, Property management fees = 100 USD, Insurance = 1000 USD, Maintenance = 10 USD, Repair = 100 USD, Other operating expenses = 1000 USD, Operating expenses = 10 USD and Net operating income (NOI) = 100 USD gives <strong>Potential gross income</strong> = 2000 USD.</p><ul><li><strong>Potential gross income</strong> = 2000 USD</li></ul><p>The line behind those figures is <strong>Potential gross income</strong> = <code>Area × Rental per area + Other income</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Potential gross income</strong> = 2000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Occupancy rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Potential gross income</strong> = <code>Area × Rental per area + Other income</code></li><li><strong>Rental per area</strong> = <code>( − Other income + Potential gross income) ÷ Area</code></li><li><strong>Area</strong> = <code>( − Other income + Potential gross income) ÷ Rental per area</code></li><li><strong>Other income</strong> = <code>− Area × Rental per area + Potential gross income</code></li><li><strong>Vacancy loss</strong> = <code>Area × Rental per area × (1 − Occupancy rate)</code></li><li><strong>Occupancy rate</strong> = <code>1 − Vacancy loss ÷ (Area × Rental per area)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Potential gross income</strong> = <code>Area × Rental per area + Other income</code> — the form to use when Area, Rental per area and Other income are the values you have.</li><li><strong>Rental per area</strong> = <code>( − Other income + Potential gross income) ÷ Area</code> — the form to use when Other income, Potential gross income and Area are the values you have.</li><li><strong>Area</strong> = <code>( − Other income + Potential gross income) ÷ Rental per area</code> — the form to use when Other income, Potential gross income and Rental per area are the values you have.</li><li><strong>Other income</strong> = <code>− Area × Rental per area + Potential gross income</code> — the form to use when Area, Rental per area and Potential gross income are the values you have.</li><li><strong>Vacancy loss</strong> = <code>Area × Rental per area × (1 − Occupancy rate)</code> — the form to use when Area, Rental per area and Occupancy rate are the values you have.</li><li><strong>Occupancy rate</strong> = <code>1 − Vacancy loss ÷ (Area × Rental per area)</code> — the form to use when Vacancy loss, Area and Rental per area are the values you have.</li><li><strong>Rental per area</strong> = <code>− Vacancy loss ÷ (Area × (Occupancy rate − 1))</code> — the form to use when Vacancy loss, Area and Occupancy rate are the values you have.</li><li><strong>Area</strong> = <code>− Vacancy loss ÷ (Rental per area × (Occupancy rate − 1))</code> — the form to use when Vacancy loss, Rental per area and Occupancy rate are the values you have.</li></ul><p>Any one of Potential gross income, Rental per area and Area can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Area, from 10 to 20 — and the answers go from <strong>Potential gross income</strong> 2000 USD to <strong>Potential gross income</strong> 3000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Area is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Potential gross income, Occupancy rate and Vacancy loss are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Area left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Area is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Rental per area left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Rental per area is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Area and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Area</strong> is a square meters quantity: the page opens it in m2 and converts anything else you pick before the formula runs. The page reads it when it works out Potential gross income, Rental per area and Other income. Have it to hand before you start: Area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Rental per area</strong> takes a plain number with no unit attached. The page reads it when it works out Potential gross income, Area and Other income. Have it to hand before you start: Rental per area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Other income</strong> takes a plain number with no unit attached. Income other than rental. The page reads it when it works out Potential gross income, Rental per area and Area. Have it to hand before you start: Other income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Area, Rental per area and Other income. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Area into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Potential gross income in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Potential gross income follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent and square meters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Area, Rental per area and Other income measured, Potential gross income and Occupancy rate wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/margin-and-vat">Margin and VAT Calculator</a>, <a href="/finance/margin">Margin Calculator</a> and <a href="/finance/margin-call">Margin call Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Net operating income is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Area, Rental per area and Other income beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net operating income calculator work out?', 'a' => <<<'TXT'
            Potential gross income, Occupancy rate, Vacancy loss and Effective gross income, from Area, Rental per area and Other income. The relationship is Potential gross income = Area × Rental per area + Other income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Area (square meters), Rental per area (USD), Other income (USD). With area, rental per area and other income in place, Potential gross income can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Potential gross income, Rental per area, Area and Other income blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Potential gross income = 2000 USD. That comes from the page\'s own defaults, entered in Area; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Potential gross income is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Area left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Potential gross income keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/margin-and-vat', 'name' => 'Margin and VAT Calculator'],
            ['path' => '/finance/margin', 'name' => 'Margin Calculator'],
            ['path' => '/finance/margin-call', 'name' => 'Margin call Calculator'],
        ],
        'authors' => [],
    ],
];
