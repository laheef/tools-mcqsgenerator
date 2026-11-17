<?php

/**
 * Simple mortgage
 * /finance/simple-mortgage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Simple mortgage',
    'meta' => ['title' => 'Simple mortgage Calculator: Free, With Steps', 'description' => 'Enter loan amount, yearly interest rate and loan term and Simple mortgage returns monthly payment and total monthly payment. The answer is shown in USD.', 'h1' => 'Simple mortgage Calculator', 'updated' => '2026-06-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loan_amount',
                            'label' => 'Loan amount',
                            'type' => 'number',
                            'help' => 'This is the value of your mortgage loan.',
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
                            'name' => 'int_rate',
                            'label' => 'Yearly interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'term',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'help' => 'Enter how long you have to repay the loan.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'payment_monthly',
                            'label' => 'Monthly payment',
                            'type' => 'number',
                            'help' => 'The fixed monthly payment required to pay off the loan over the selected term, not including additional costs and fees.',
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
                            'name' => 'additional_costs',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include taxes, insurance, and fees?' => '1'],
                            'dataset' => 'additional',
                            'control' => 'CHECKBOX',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'property_tax',
                            'label' => 'Property tax',
                            'type' => 'number',
                            'help' => 'The yearly taxes charged by local authorities on the property. It will be divided into monthly payments.',
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
                            'name' => 'home_insurance',
                            'label' => 'Yearly homeowners insurance',
                            'type' => 'number',
                            'help' => 'The yearly cost of homeowners insurance.',
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
                            'name' => 'pmi',
                            'label' => 'PMI / mortgage insurance',
                            'type' => 'number',
                            'help' => 'Monthly private mortgage insurance (PMI) payment. PMI is often required for borrowers with a down payment below 20%.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hoa_fee',
                            'label' => 'Monthly HOA fees',
                            'type' => 'number',
                            'help' => 'The monthly fee charged by your homeowners association.',
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
                            'name' => 'other_costs',
                            'label' => 'Other monthly costs',
                            'type' => 'number',
                            'help' => 'Any other property-related costs not covered by taxes, insurance, HOA fees, or PMI.',
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
                            'name' => 'payment_total',
                            'label' => 'Total monthly payment',
                            'type' => 'number',
                            'help' => 'Your estimated total monthly payment, including taxes, insurance, and fees.',
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
                            'name' => 'n_monthly',
                            'label' => 'Loan term',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'costs_add',
                            'label' => 'Costs add',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'principal',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'interest',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'property_tax_monthly',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'home_insurance_monthly',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'pmi_monthly',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'other_costs_rounded',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'n_monthly = 12 * term',
            'results' => ['n_monthly' => '12*term', 'term' => '(1/12)*n_monthly'],
        ],
        [
            'title' => 'payment_monthly = (loan_amount * (int_rate / 12) * (1 + (int_rate / 12)) ^ n_monthly) / ((1 + (int_rate / 12)) ^ n_monthly - 1)',
            'results' => ['loan_amount' => '12*payment_monthly*(-pow(12, n_monthly) + pow(int_rate + 12, n_monthly))*pow(int_rate + 12, -n_monthly)/int_rate', 'payment_monthly' => '(1/12)*int_rate*loan_amount*pow(int_rate + 12, n_monthly)/(-pow(12, n_monthly) + pow(int_rate + 12, n_monthly))'],
        ],
        [
            'title' => 'costs_add = property_tax + home_insurance + hoa_fee * 12 + other_costs * 12 ',
            'results' => [
                'property_tax' => 'costs_add - 12*hoa_fee - home_insurance - 12*other_costs',
                'costs_add' => '12*hoa_fee + home_insurance + 12*other_costs + property_tax',
                'home_insurance' => 'costs_add - 12*hoa_fee - 12*other_costs - property_tax',
                'other_costs' => '(1/12)*costs_add - hoa_fee - 1/12*home_insurance - 1/12*property_tax',
                'hoa_fee' => '(1/12)*costs_add - 1/12*home_insurance - other_costs - 1/12*property_tax',
            ],
        ],
        [
            'title' => 'payment_total = payment_monthly + (loan_amount * pmi / 12) + costs_add / 12',
            'results' => [
                'costs_add' => '-loan_amount*pmi - 12*payment_monthly + 12*payment_total',
                'pmi' => '(-costs_add - 12*payment_monthly + 12*payment_total)/loan_amount',
                'loan_amount' => '(-costs_add - 12*payment_monthly + 12*payment_total)/pmi',
                'payment_monthly' => '-1/12*costs_add - 1/12*loan_amount*pmi + payment_total',
                'payment_total' => '(1/12)*costs_add + (1/12)*loan_amount*pmi + payment_monthly',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Simple mortgage converts between loan amount and monthly payment: put a value in either box and the other one is worked out. The main result, Loan amount, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Simple mortgage calculator works', 'html' => <<<'TXT'
            <p>Simple mortgage answers one question from 1 number, and the answer is Loan amount, Monthly payment and Property tax.</p><p>Written with the labels from the form, Loan term = 12 × Loan term.</p><p>What comes back is Loan amount, Monthly payment, Property tax and Yearly homeowners insurance — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Loan term</strong> — in years. Enter how long you have to repay the loan.</li></ul><p>The result boxes are Loan amount in USD, Monthly payment in USD, Property tax in USD, Yearly homeowners insurance in USD, PMI / mortgage insurance in percent, Monthly HOA fees in USD, Other monthly costs in USD, Total monthly payment in USD, Loan term, Costs add; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: PMI / mortgage insurance offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Loan term</strong> = <code>12 × Loan term</code></li><li><strong>Monthly payment</strong> = <code>(1 ÷ 12) × Yearly interest rate × Loan amount × (Yearly interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Yearly interest rate + 12)^(Loan term))</code></li><li><strong>Loan amount</strong> = <code>12 × Monthly payment × ( − (12)^(Loan term) + (Yearly interest rate + 12)^(Loan term)) × (Yearly interest rate + 12)^(− Loan term) ÷ Yearly interest rate</code></li><li><strong>Costs add</strong> = <code>12 × Monthly HOA fees + Yearly homeowners insurance + 12 × Other monthly costs + Property tax</code></li><li><strong>Property tax</strong> = <code>Costs add − 12 × Monthly HOA fees − Yearly homeowners insurance − 12 × Other monthly costs</code></li><li><strong>Yearly homeowners insurance</strong> = <code>Costs add − 12 × Monthly HOA fees − 12 × Other monthly costs − Property tax</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Loan term</strong> = <code>12 × Loan term</code> — the form to use when Loan term are the values you have.</li><li><strong>Loan term</strong> = <code>(1 ÷ 12) × Loan term</code> — the form to use when Loan term are the values you have.</li><li><strong>Monthly payment</strong> = <code>(1 ÷ 12) × Yearly interest rate × Loan amount × (Yearly interest rate + 12)^(Loan term) ÷ ( − (12)^(Loan term) + (Yearly interest rate + 12)^(Loan term))</code> — the form to use when Yearly interest rate, Loan amount and Loan term are the values you have.</li><li><strong>Loan amount</strong> = <code>12 × Monthly payment × ( − (12)^(Loan term) + (Yearly interest rate + 12)^(Loan term)) × (Yearly interest rate + 12)^(− Loan term) ÷ Yearly interest rate</code> — the form to use when Monthly payment, Loan term and Yearly interest rate are the values you have.</li><li><strong>Costs add</strong> = <code>12 × Monthly HOA fees + Yearly homeowners insurance + 12 × Other monthly costs + Property tax</code> — the form to use when Monthly HOA fees, Yearly homeowners insurance, Other monthly costs and Property tax are the values you have.</li><li><strong>Property tax</strong> = <code>Costs add − 12 × Monthly HOA fees − Yearly homeowners insurance − 12 × Other monthly costs</code> — the form to use when Costs add, Monthly HOA fees, Yearly homeowners insurance and Other monthly costs are the values you have.</li><li><strong>Yearly homeowners insurance</strong> = <code>Costs add − 12 × Monthly HOA fees − 12 × Other monthly costs − Property tax</code> — the form to use when Costs add, Monthly HOA fees, Other monthly costs and Property tax are the values you have.</li><li><strong>Other monthly costs</strong> = <code>(1 ÷ 12) × Costs add − Monthly HOA fees − 1 ÷ 12 × Yearly homeowners insurance − 1 ÷ 12 × Property tax</code> — the form to use when Costs add, Monthly HOA fees, Yearly homeowners insurance and Property tax are the values you have.</li></ul><p>Any one of Loan term, Loan term and Monthly payment can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Loan term is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Loan amount, Monthly payment and Property tax are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loan term left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loan term is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Loan term to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Simple mortgage form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Loan term</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. Enter how long you have to repay the loan. Change it and Loan term changes with it. Fill it from a measurement rather than a memory — Loan term is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Loan amount</strong> is a plain number. The value follows from Monthly payment, Loan term and Yearly interest rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly payment</strong> is a plain number. The value follows from Yearly interest rate, Loan amount and Loan term. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Property tax</strong> is a plain number. The value follows from Costs add, Monthly HOA fees, Yearly homeowners insurance and Other monthly costs. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Yearly homeowners insurance</strong> is a plain number. The value follows from Costs add, Monthly HOA fees, Other monthly costs and Property tax. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>PMI / mortgage insurance</strong> is a percent figure. The value follows from Costs add, Monthly payment, Total monthly payment and Loan amount. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly HOA fees</strong> is a plain number. The value follows from Costs add, Yearly homeowners insurance, Other monthly costs and Property tax. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Other monthly costs</strong> is a plain number. The value follows from Costs add, Monthly HOA fees, Yearly homeowners insurance and Property tax. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total monthly payment</strong> is a plain number. The value follows from Costs add, Loan amount, PMI / mortgage insurance and Monthly payment. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Loan term</strong> is a plain number. The value follows from Loan term. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Costs add</strong> is a plain number. The value follows from Monthly HOA fees, Yearly homeowners insurance, Other monthly costs and Property tax. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Simple mortgage actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Loan amount is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Loan term are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Loan term is what you already know and Loan amount and Monthly payment is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/perpetuity">Perpetuity</a>, <a href="/finance/personal-loan">Personal loan</a> and <a href="/finance/phillips-curve">Phillips curve Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Simple mortgage calculator work out?', 'a' => 'Loan amount, Monthly payment, Property tax and Yearly homeowners insurance, from Loan term. The relationship is Loan term = 12 × Loan term.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Loan term (years). Fill loan term and leave Loan amount empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Loan term, Loan term, Monthly payment and Loan amount blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Loan amount is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Loan term blank and the page solves for it, reporting Loan amount instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Loan amount at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/perpetuity', 'name' => 'Perpetuity'],
            ['path' => '/finance/personal-loan', 'name' => 'Personal loan'],
            ['path' => '/finance/phillips-curve', 'name' => 'Phillips curve Calculator'],
        ],
        'authors' => [],
    ],
];
