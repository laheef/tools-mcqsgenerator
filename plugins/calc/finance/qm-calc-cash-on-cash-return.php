<?php

/**
 * Cash-on-cash return
 * /finance/cash-on-cash-return
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cash-on-cash return',
    'meta' => ['title' => 'Cash-on-cash return Calculator: Free, With Steps', 'description' => 'Cash-on-cash return turns total cash investment, gross annual rental income (100% occupancy) and vacancy rate into net operating income and annual debt service.', 'h1' => 'Cash-on-cash return Calculator', 'updated' => '2026-09-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Investment',
                            'label' => 'Total cash investment',
                            'type' => 'number',
                            'help' => 'Total out-of-pocket money required to buy, repair, and close on the property. Do not include borrowed funds.',
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
                            'name' => 'GrossAnnualRentalIncome',
                            'label' => 'Gross annual rental income (100% occupancy)',
                            'type' => 'number',
                            'help' => 'The total rental revenue expected over 12 months assuming every unit is rented all year long.',
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
                            'name' => 'VacancyRate',
                            'label' => 'Vacancy rate',
                            'type' => 'number',
                            'help' => 'Estimated percentage of time the property stays unrented or collected rent is lost per year (typically 5%-10%).',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'AnnualExpense',
                            'label' => 'Annual expenses for this property',
                            'type' => 'number',
                            'help' => 'Total yearly operating costs (such as property taxes, insurance, repairs, utilities, and management fees) excluding loan payments.',
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
                            'name' => 'MonthlyLoanPayment',
                            'label' => 'Monthly loan payment',
                            'type' => 'number',
                            'help' => 'Your recurring monthly mortgage payment (principal and interest). Enter 0 if paying with 100% cash.',
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
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CashOnCashReturn',
                            'label' => 'Cash-on-cash return',
                            'type' => 'number',
                            'help' => 'The annual rate of return on the total cash you invested out of pocket: (Annual cash flow / Total cash investment) × 100.',
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
                            'name' => 'NetOperatingIncome',
                            'label' => 'Net operating income',
                            'type' => 'number',
                            'help' => 'Annual income remaining after accounting for vacancies and operating expenses, before debt service.',
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
                            'name' => 'AnnualDebtService',
                            'label' => 'Annual debt service',
                            'type' => 'number',
                            'help' => 'Total mortgage payments made across all 12 months of the year.',
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
                            'name' => 'AnnualCashFlow',
                            'label' => 'Annual cash flow',
                            'type' => 'number',
                            'help' => 'Net profit remaining at the end of the year after all expenses and mortgage payments are covered.',
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
                            'name' => 'EffectiveGrossIncome',
                            'label' => 'Effective gross income',
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
            'title' => 'EffectiveGrossIncome = GrossAnnualRentalIncome * (1 - VacancyRate)',
            'results' => ['EffectiveGrossIncome' => 'GrossAnnualRentalIncome*(1 - VacancyRate)', 'GrossAnnualRentalIncome' => '-EffectiveGrossIncome/(VacancyRate - 1)', 'VacancyRate' => '(-EffectiveGrossIncome + GrossAnnualRentalIncome)/GrossAnnualRentalIncome'],
        ],
        [
            'title' => 'AnnualDebtService = MonthlyLoanPayment * 12',
            'results' => ['MonthlyLoanPayment' => '(1/12)*AnnualDebtService', 'AnnualDebtService' => '12*MonthlyLoanPayment'],
        ],
        [
            'title' => 'NetOperatingIncome = EffectiveGrossIncome - AnnualExpense',
            'results' => ['EffectiveGrossIncome' => 'AnnualExpense + NetOperatingIncome', 'AnnualExpense' => 'EffectiveGrossIncome - NetOperatingIncome', 'NetOperatingIncome' => '-AnnualExpense + EffectiveGrossIncome'],
        ],
        [
            'title' => 'AnnualCashFlow = NetOperatingIncome - AnnualDebtService',
            'results' => ['AnnualCashFlow' => '-AnnualDebtService + NetOperatingIncome', 'AnnualDebtService' => '-AnnualCashFlow + NetOperatingIncome', 'NetOperatingIncome' => 'AnnualCashFlow + AnnualDebtService'],
        ],
        [
            'title' => 'CashOnCashReturn = (AnnualCashFlow/ Investment)',
            'results' => ['Investment' => 'AnnualCashFlow/CashOnCashReturn', 'CashOnCashReturn' => 'AnnualCashFlow/Investment', 'AnnualCashFlow' => 'CashOnCashReturn*Investment'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cash-on-cash return works out Total cash investment and Annual expenses for this property from Gross annual rental income (100% occupancy) and Vacancy rate. There is no hidden constant here: change total cash investment and gross annual rental income (100% occupancy) moves with it. The main result, Total cash investment, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Cash-on-cash return calculator works', 'html' => <<<'TXT'
            <p>The Cash-on-cash return calculator applies one relationship to 2 numbers and reports Total cash investment, Annual expenses for this property and Monthly loan payment.</p><p>In the form&#039;s own words, Effective gross income = Gross annual rental income (100% occupancy) × (1 − Vacancy rate).</p><p>The result panel carries Total cash investment, Annual expenses for this property, Monthly loan payment and Cash-on-cash return, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Gross annual rental income (100% occupancy)</strong> — in USD. The total rental revenue expected over 12 months assuming every unit is rented all year long.</li><li><strong>Vacancy rate</strong> — in percent. Estimated percentage of time the property stays unrented or collected rent is lost per year (typically 5%-10%).</li></ul><p>The result boxes are Total cash investment in USD, Annual expenses for this property in USD, Monthly loan payment in USD, Cash-on-cash return in percent, Net operating income in USD, Annual debt service in USD, Annual cash flow in USD, Effective gross income in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Total cash investment = 10 USD, Gross annual rental income (100% occupancy) = 100 USD, Vacancy rate = 1000 perc, Annual expenses for this property = 10 USD, Monthly loan payment = 100 USD, Cash-on-cash return = 1000 perc, Net operating income = 10 USD, Annual debt service = 100 USD and Annual cash flow = 1000 USD; the answers are <strong>Effective gross income</strong> = -99900 USD.</p><ul><li><strong>Effective gross income</strong> = -99900 USD</li></ul><p>The line behind those figures is <strong>Effective gross income</strong> = <code>Gross annual rental income (100% occupancy) × (1 − Vacancy rate)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Effective gross income</strong> = -99900. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Cash-on-cash return lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Effective gross income</strong> = <code>Gross annual rental income (100% occupancy) × (1 − Vacancy rate)</code></li><li><strong>Gross annual rental income (100% occupancy)</strong> = <code>− Effective gross income ÷ (Vacancy rate − 1)</code></li><li><strong>Vacancy rate</strong> = <code>( − Effective gross income + Gross annual rental income (100% occupancy)) ÷ Gross annual rental income (100% occupancy)</code></li><li><strong>Annual debt service</strong> = <code>12 × Monthly loan payment</code></li><li><strong>Monthly loan payment</strong> = <code>(1 ÷ 12) × Annual debt service</code></li><li><strong>Net operating income</strong> = <code>− Annual expenses for this property + Effective gross income</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Effective gross income</strong> = <code>Gross annual rental income (100% occupancy) × (1 − Vacancy rate)</code> — the form to use when Gross annual rental income (100% occupancy) and Vacancy rate are the values you have.</li><li><strong>Gross annual rental income (100% occupancy)</strong> = <code>− Effective gross income ÷ (Vacancy rate − 1)</code> — the form to use when Effective gross income and Vacancy rate are the values you have.</li><li><strong>Vacancy rate</strong> = <code>( − Effective gross income + Gross annual rental income (100% occupancy)) ÷ Gross annual rental income (100% occupancy)</code> — the form to use when Effective gross income and Gross annual rental income (100% occupancy) are the values you have.</li><li><strong>Annual debt service</strong> = <code>12 × Monthly loan payment</code> — the form to use when Monthly loan payment are the values you have.</li><li><strong>Monthly loan payment</strong> = <code>(1 ÷ 12) × Annual debt service</code> — the form to use when Annual debt service are the values you have.</li><li><strong>Net operating income</strong> = <code>− Annual expenses for this property + Effective gross income</code> — the form to use when Annual expenses for this property and Effective gross income are the values you have.</li><li><strong>Effective gross income</strong> = <code>Annual expenses for this property + Net operating income</code> — the form to use when Annual expenses for this property and Net operating income are the values you have.</li><li><strong>Annual expenses for this property</strong> = <code>Effective gross income − Net operating income</code> — the form to use when Effective gross income and Net operating income are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Effective gross income, Gross annual rental income (100% occupancy) and Vacancy rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total cash investment from 10 to 20, leaving every other box alone. The panel moves from <strong>Effective gross income</strong> -99900 USD to <strong>Effective gross income</strong> -99900 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Vacancy rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Total cash investment, Annual expenses for this property and Monthly loan payment are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Gross annual rental income (100% occupancy) left as a guess.</strong> Anything typed into Gross annual rental income (100% occupancy) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Vacancy rate left as a guess.</strong> Anything typed into Vacancy rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Gross annual rental income (100% occupancy) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cash-on-cash return form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Gross annual rental income (100% occupancy)</strong> takes a plain number with no unit attached. The total rental revenue expected over 12 months assuming every unit is rented all year long. It feeds Effective gross income and Vacancy rate. Fill it from a measurement rather than a memory — Gross annual rental income (100% occupancy) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Vacancy rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Estimated percentage of time the property stays unrented or collected rent is lost per year (typically 5%-10%). It feeds Effective gross income and Gross annual rental income (100% occupancy). Fill it from a measurement rather than a memory — Vacancy rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 8 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total cash investment</strong> is a plain number. It is worked out from Annual cash flow and Cash-on-cash return. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annual expenses for this property</strong> is a plain number. It is worked out from Effective gross income and Net operating income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly loan payment</strong> is a plain number. It is worked out from Annual debt service. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Cash-on-cash return</strong> is a percent figure. It is worked out from Annual cash flow and Total cash investment. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Net operating income</strong> is a plain number. It is worked out from Annual expenses for this property and Effective gross income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annual debt service</strong> is a plain number. It is worked out from Monthly loan payment. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annual cash flow</strong> is a plain number. It is worked out from Annual debt service and Net operating income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Effective gross income</strong> is a plain number and the page's own defaults put it at -99900. It is worked out from Gross annual rental income (100% occupancy) and Vacancy rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total cash investment is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Gross annual rental income (100% occupancy) and Vacancy rate is what you already know and Total cash investment and Annual expenses for this property is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/days-sales-outstanding">Day sales outstanding (DSO) Calculator</a>, <a href="/finance/days-inventory-outstanding">Days inventory outstanding (DIO) Calculator</a> and <a href="/finance/days-payable-outstanding">Days payable outstanding (DPO) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cash-on-cash return calculator work out?', 'a' => <<<'TXT'
            Total cash investment, Annual expenses for this property, Monthly loan payment and Cash-on-cash return, from Gross annual rental income (100% occupancy) and Vacancy rate. The relationship is Effective gross income = Gross annual rental income (100% occupancy) × (1 − Vacancy rate).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Gross annual rental income (100% occupancy) (USD), Vacancy rate (percent). Enter gross annual rental income (100% occupancy) and vacancy rate; Total cash investment is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Effective gross income, Gross annual rental income (100% occupancy), Vacancy rate and Annual debt service can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Effective gross income = -99900 USD. That comes from the page's own defaults, entered in Gross annual rental income (100% occupancy); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Total cash investment is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Gross annual rental income (100% occupancy) blank and the page solves for it, reporting Total cash investment instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total cash investment at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/days-sales-outstanding', 'name' => 'Day sales outstanding (DSO) Calculator'],
            ['path' => '/finance/days-inventory-outstanding', 'name' => 'Days inventory outstanding (DIO) Calculator'],
            ['path' => '/finance/days-payable-outstanding', 'name' => 'Days payable outstanding (DPO) Calculator'],
        ],
        'authors' => [],
    ],
];
