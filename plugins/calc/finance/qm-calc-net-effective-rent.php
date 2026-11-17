<?php

/**
 * Net effective rent
 * /finance/net-effective-rent
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net effective rent',
    'meta' => ['title' => 'Net effective rent: Formula, Steps & Results', 'description' => 'Net effective rent works out monthly rent from lease term and property area. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Net effective rent Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => 'Term and rent',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lease_term',
                            'label' => 'Lease term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12.000000000000000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'property_area',
                            'label' => 'Property area',
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
                            'name' => 'base_rent',
                            'label' => 'Base rent',
                            'type' => 'number',
                            'help' => 'Rent per month per unit area.',
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
                            'name' => 'montly_rent',
                            'label' => 'Monthly rent',
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
            'title' => 'Discounts for tenants',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rent_free_months',
                            'label' => 'No. of rent-free months',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tenant_cash_allowance_m2',
                            'label' => 'Tenant cash allowance',
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
                            'name' => 'tenant_cash_allowance',
                            'label' => 'Tenant cash allowance',
                            'type' => 'number',
                            'help' => 'One-time reimbursement for construction works which were paid by tenants.',
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
            'title' => 'Additional landlord expenses',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Operating_costs',
                            'label' => 'Operating costs',
                            'type' => 'number',
                            'help' => 'For example, cleaning, repairs...',
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
                            'name' => 'Operating_costs_percentage',
                            'label' => 'Operating costs %',
                            'type' => 'number',
                            'help' => 'Expressed as a percentage of the base rental rate.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Net effective rent (monthly)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_effective_rent',
                            'label' => 'Net effective rent',
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
                            'name' => 'net_effective_rate',
                            'label' => 'Net effective rate (monthly)',
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
            'title' => 'Net effective rent (annual)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_effective_rent_annual',
                            'label' => 'Net effective rent',
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
                            'name' => 'net_effective_rate_anual',
                            'label' => 'Net effective rate (annual)',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area_question',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Enable area-based calculations?' => '1'],
                            'dataset' => 'enable_area',
                            'control' => 'CHECKBOX',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Operating_costs_percentage = Operating_costs/(montly_rent )',
            'results' => ['Operating_costs' => 'Operating_costs_percentage*montly_rent', 'montly_rent' => 'Operating_costs/Operating_costs_percentage', 'Operating_costs_percentage' => 'Operating_costs/montly_rent'],
        ],
        [
            'title' => 'net_effective_rent_annual = (montly_rent *(lease_term - rent_free_months) - Operating_costs*lease_term - tenant_cash_allowance )*12/lease_term',
            'results' => [
                'lease_term' => '12*(-montly_rent*rent_free_months - tenant_cash_allowance)/(12*Operating_costs - 12*montly_rent + net_effective_rent_annual)',
                'rent_free_months' => '(-Operating_costs*lease_term + lease_term*montly_rent - 1/12*lease_term*net_effective_rent_annual - tenant_cash_allowance)/montly_rent',
                'Operating_costs' => 'montly_rent - 1/12*net_effective_rent_annual - montly_rent*rent_free_months/lease_term - tenant_cash_allowance/lease_term',
                'montly_rent' => '(Operating_costs*lease_term + (1/12)*lease_term*net_effective_rent_annual + tenant_cash_allowance)/(lease_term - rent_free_months)',
                'net_effective_rent_annual' => '12*(lease_term*(-Operating_costs + montly_rent) - montly_rent*rent_free_months - tenant_cash_allowance)/lease_term',
                'tenant_cash_allowance' => '-Operating_costs*lease_term + lease_term*montly_rent - 1/12*lease_term*net_effective_rent_annual - montly_rent*rent_free_months',
            ],
        ],
        [
            'title' => 'net_effective_rate_anual = net_effective_rent_annual/property_area',
            'results' => ['net_effective_rate_anual' => 'net_effective_rent_annual/property_area', 'net_effective_rent_annual' => 'net_effective_rate_anual*property_area', 'property_area' => 'net_effective_rent_annual/net_effective_rate_anual'],
        ],
        [
            'title' => 'montly_rent = base_rent*property_area',
            'results' => ['base_rent' => 'montly_rent/property_area', 'montly_rent' => 'base_rent*property_area', 'property_area' => 'montly_rent/base_rent'],
        ],
        [
            'title' => 'net_effective_rate = net_effective_rate_anual/12',
            'results' => ['net_effective_rate_anual' => '12*net_effective_rate', 'net_effective_rate' => '(1/12)*net_effective_rate_anual'],
        ],
        [
            'title' => 'net_effective_rent = net_effective_rent_annual/12',
            'results' => ['net_effective_rent_annual' => '12*net_effective_rent', 'net_effective_rent' => '(1/12)*net_effective_rent_annual'],
        ],
        [
            'title' => 'tenant_cash_allowance = tenant_cash_allowance_m2*property_area',
            'results' => ['tenant_cash_allowance_m2' => 'tenant_cash_allowance/property_area', 'property_area' => 'tenant_cash_allowance/tenant_cash_allowance_m2', 'tenant_cash_allowance' => 'property_area*tenant_cash_allowance_m2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Net effective rent works out Lease term and Property area from Monthly rent and Operating costs. Nothing is looked up on this page: lease term is computed from monthly rent and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Lease term is opened in years / months; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Net effective rent calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Net effective rent: it takes 2 numbers and reports Lease term, Property area and Base rent.</p><p>Written with the labels from the form, Operating costs % = Operating costs ÷ Monthly rent.</p><p>What comes back is Lease term, Property area, Base rent and No. of rent-free months — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Monthly rent</strong> — in USD</li><li><strong>Operating costs</strong> — in USD. For example, cleaning, repairs...</li></ul><p>What you get back is Lease term in years / months, Property area in square meters, Base rent in USD, No. of rent-free months, Tenant cash allowance in USD, Tenant cash allowance in USD, Operating costs % in percent, Net effective rent in USD, Net effective rate (monthly) in USD, Net effective rent in USD, Net effective rate (annual) in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Lease term lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Operating costs %</strong> = <code>Operating costs ÷ Monthly rent</code></li><li><strong>Operating costs</strong> = <code>Operating costs % × Monthly rent</code></li><li><strong>Monthly rent</strong> = <code>Operating costs ÷ Operating costs %</code></li><li><strong>Net effective rent</strong> = <code>12 × (Lease term × ( − Operating costs + Monthly rent) − Monthly rent × No. of rent-free months − Tenant cash allowance) ÷ Lease term</code></li><li><strong>Lease term</strong> = <code>12 × ( − Monthly rent × No. of rent-free months − Tenant cash allowance) ÷ (12 × Operating costs − 12 × Monthly rent + Net effective rent)</code></li><li><strong>No. of rent-free months</strong> = <code>( − Operating costs × Lease term + Lease term × Monthly rent − 1 ÷ 12 × Lease term × Net effective rent − Tenant cash allowance) ÷ Monthly rent</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Operating costs %</strong> = <code>Operating costs ÷ Monthly rent</code> — the form to use when Operating costs and Monthly rent are the values you have.</li><li><strong>Operating costs</strong> = <code>Operating costs % × Monthly rent</code> — the form to use when Operating costs % and Monthly rent are the values you have.</li><li><strong>Monthly rent</strong> = <code>Operating costs ÷ Operating costs %</code> — the form to use when Operating costs and Operating costs % are the values you have.</li><li><strong>Net effective rent</strong> = <code>12 × (Lease term × ( − Operating costs + Monthly rent) − Monthly rent × No. of rent-free months − Tenant cash allowance) ÷ Lease term</code> — the form to use when Lease term, Operating costs, Monthly rent and No. of rent-free months are the values you have.</li><li><strong>Lease term</strong> = <code>12 × ( − Monthly rent × No. of rent-free months − Tenant cash allowance) ÷ (12 × Operating costs − 12 × Monthly rent + Net effective rent)</code> — the form to use when Monthly rent, No. of rent-free months, Tenant cash allowance and Operating costs are the values you have.</li><li><strong>No. of rent-free months</strong> = <code>( − Operating costs × Lease term + Lease term × Monthly rent − 1 ÷ 12 × Lease term × Net effective rent − Tenant cash allowance) ÷ Monthly rent</code> — the form to use when Operating costs, Lease term, Monthly rent and Net effective rent are the values you have.</li><li><strong>Operating costs</strong> = <code>Monthly rent − 1 ÷ 12 × Net effective rent − Monthly rent × No. of rent-free months ÷ Lease term − Tenant cash allowance ÷ Lease term</code> — the form to use when Monthly rent, Net effective rent, No. of rent-free months and Lease term are the values you have.</li><li><strong>Monthly rent</strong> = <code>(Operating costs × Lease term + (1 ÷ 12) × Lease term × Net effective rent + Tenant cash allowance) ÷ (Lease term − No. of rent-free months)</code> — the form to use when Operating costs, Lease term, Net effective rent and Tenant cash allowance are the values you have.</li></ul><p>Any one of Operating costs %, Operating costs and Monthly rent can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Lease term, Property area and Base rent are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Monthly rent left as a guess.</strong> Anything typed into Monthly rent is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Operating costs left as a guess.</strong> Anything typed into Operating costs is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Monthly rent and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Monthly rent</strong> takes a plain number with no unit attached. Change it and Operating costs, Operating costs % and Lease term changes with it. Have it to hand before you start: Monthly rent is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Operating costs</strong> takes a plain number with no unit attached. For example, cleaning, repairs. Change it and Monthly rent, Operating costs % and Lease term changes with it. Have it to hand before you start: Operating costs is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Lease term</strong> is a years / months figure. It is computed from Monthly rent, No. of rent-free months, Tenant cash allowance and Operating costs, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Property area</strong> is a square meters figure. It is computed from Net effective rent and Net effective rate (annual), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Base rent</strong> is a plain number. It is computed from Monthly rent and Property area, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>No. of rent-free months</strong> is a plain number. It is computed from Operating costs, Lease term, Monthly rent and Net effective rent, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tenant cash allowance</strong> is a plain number. It is computed from Tenant cash allowance and Property area, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tenant cash allowance</strong> is a plain number. It is computed from Operating costs, Lease term, Monthly rent and Net effective rent, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Operating costs %</strong> is a percent figure. It is computed from Operating costs and Monthly rent, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net effective rent</strong> is a plain number. It is computed from Net effective rent, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net effective rate (monthly)</strong> is a plain number. It is computed from Net effective rate (annual), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net effective rent</strong> is a plain number. It is computed from Lease term, Operating costs, Monthly rent and No. of rent-free months, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net effective rate (annual)</strong> is a plain number. It is computed from Net effective rent and Property area, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Lease term is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are years / months, square meters and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Monthly rent and Operating costs are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Monthly rent and Operating costs and the number you are missing is Lease term and Property area.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/car-lease">Car lease Calculator</a>, <a href="/finance/car-refinance">Car refinance Calculator</a> and <a href="/finance/carried-interest">Carried interest Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net effective rent calculator work out?', 'a' => <<<'TXT'
            Lease term, Property area, Base rent and No. of rent-free months, from Operating costs and Monthly rent. The relationship is Operating costs % = Operating costs ÷ Monthly rent.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Monthly rent (USD), Operating costs (USD). With monthly rent and operating costs in place, Lease term can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Operating costs %, Operating costs, Monthly rent and Net effective rent blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Lease term is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Monthly rent left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Lease term at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/car-lease', 'name' => 'Car lease Calculator'],
            ['path' => '/finance/car-refinance', 'name' => 'Car refinance Calculator'],
            ['path' => '/finance/carried-interest', 'name' => 'Carried interest Calculator'],
        ],
        'authors' => [],
    ],
];
