<?php

/**
 * Depreciation
 * /finance/depreciation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Depreciation',
    'meta' => ['title' => 'Depreciation Calculator — Formula & Results', 'description' => 'Depreciation works out end book value and reports both. A worked example walks through the arithmetic with this page\'s own numbers. Any box can be the unknown.', 'h1' => 'Depreciation Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Asset details',
            'note' => 'Choose the depreciation method to apply, enter the original cost, and the salvage value of the asset. Adjust the asset lifetime and end book point as needed.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'depreciation_method',
                            'label' => 'Depreciation method',
                            'type' => 'select',
                            'options' => ['Straight line depreciation' => '0', 'Declining balance depreciation' => '1', 'Sum-of-years\' digits depreciation' => '2'],
                            'dataset' => 'depreciation_method',
                            'default' => 'Straight line depreciation',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'original_cost',
                            'label' => 'Original cost',
                            'type' => 'number',
                            'help' => 'The original value or purchasing price.',
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
                            'name' => 'residual_value',
                            'label' => 'Salvage value',
                            'type' => 'number',
                            'help' => 'Also known as "Residual value". It represents the estimated amount of money an asset will be worth at the end of its lifetime.',
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
                            'name' => 'lifetime',
                            'label' => 'Lifetime',
                            'type' => 'number',
                            'help' => 'The estimated number of years the asset is likely to remain in service.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'years',
                            'label' => 'End book value after...',
                            'type' => 'number',
                            'help' => 'The year at which you would like to compute the book value of the asset.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
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
                            'name' => 'straight_line_expense',
                            'label' => 'Depreciation expense',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'end_book_value_straight_line',
                            'label' => 'End book value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
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
                            'name' => 'declining_balance_percents',
                            'label' => 'Depreciation rate',
                            'type' => 'number',
                            'help' => 'For this method, use a non-zero residual value.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'declining_balance_expense',
                            'label' => 'Depreciation expense',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'end_book_value_declining_balance',
                            'label' => 'End book value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
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
                            'name' => 'sum_of_years_digits_expense',
                            'label' => 'Depreciation expense',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'end_book_value_sum_of_years_digits',
                            'label' => 'End book value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
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
            'title' => 'end_book_value_straight_line = original_cost - years *((original_cost - residual_value) / lifetime)',
            'results' => [
                'residual_value' => '(end_book_value_straight_line*lifetime - lifetime*original_cost + original_cost*years)/years',
                'lifetime' => 'years*(-original_cost + residual_value)/(end_book_value_straight_line - original_cost)',
                'end_book_value_straight_line' => '(lifetime*original_cost - original_cost*years + residual_value*years)/lifetime',
                'original_cost' => '(end_book_value_straight_line*lifetime - residual_value*years)/(lifetime - years)',
                'years' => 'lifetime*(-end_book_value_straight_line + original_cost)/(original_cost - residual_value)',
            ],
        ],
        [
            'title' => 'end_book_value_declining_balance = original_cost * (1-declining_balance_percents)^years',
            'results' => ['declining_balance_percents' => '1 - pow(end_book_value_declining_balance/original_cost, 1/years)', 'years' => 'log(end_book_value_declining_balance/original_cost)/log(1 - declining_balance_percents)', 'end_book_value_declining_balance' => 'original_cost*pow(1 - declining_balance_percents, years)', 'original_cost' => 'end_book_value_declining_balance*pow(1 - declining_balance_percents, -years)'],
        ],
        [
            'title' => 'straight_line_expense = (original_cost - residual_value) / lifetime',
            'results' => ['residual_value' => '-lifetime*straight_line_expense + original_cost', 'original_cost' => 'lifetime*straight_line_expense + residual_value', 'straight_line_expense' => '(original_cost - residual_value)/lifetime', 'lifetime' => '(original_cost - residual_value)/straight_line_expense'],
        ],
        [
            'title' => 'declining_balance_expense = (original_cost * (1-declining_balance_percents)^(years-1)) * declining_balance_percents',
            'results' => ['years' => 'log(declining_balance_expense*(1 - declining_balance_percents)/(declining_balance_percents*original_cost))/log(1 - declining_balance_percents)', 'original_cost' => 'declining_balance_expense*pow(1 - declining_balance_percents, 1 - years)/declining_balance_percents', 'declining_balance_expense' => 'declining_balance_percents*original_cost*pow(1 - declining_balance_percents, years - 1)'],
        ],
        [
            'title' => <<<'TXT'
            end_book_value_sum_of_years_digits = original_cost - (original_cost - residual_value) / ((lifetime^2 +lifetime)/2) * (years*lifetime - ((years-1)^2 + (years-1))/2)
            TXT,
            'results' => [
                'residual_value' => <<<'TXT'
                (end_book_value_sum_of_years_digits*pow(lifetime, 2) + end_book_value_sum_of_years_digits*lifetime - pow(lifetime, 2)*original_cost + 2*lifetime*original_cost*years - lifetime*original_cost - original_cost*pow(years, 2) + original_cost*years)/(years*(2*lifetime - years + 1))
                TXT,
                'lifetime' => <<<'TXT'
                (-1/2*end_book_value_sum_of_years_digits - original_cost*years + (1/2)*original_cost + residual_value*years + (1/2)*sqrt(pow(end_book_value_sum_of_years_digits, 2) + 4*end_book_value_sum_of_years_digits*original_cost*pow(years, 2) - 2*end_book_value_sum_of_years_digits*original_cost - 4*end_book_value_sum_of_years_digits*residual_value*pow(years, 2) + pow(original_cost, 2) - 4*original_cost*residual_value*pow(years, 2) + 4*pow(residual_value, 2)*pow(years, 2)))/(end_book_value_sum_of_years_digits - original_cost)
                TXT,
                'end_book_value_sum_of_years_digits' => <<<'TXT'
                (pow(lifetime, 2)*original_cost - 2*lifetime*original_cost*years + lifetime*original_cost + 2*lifetime*residual_value*years + original_cost*pow(years, 2) - original_cost*years - residual_value*pow(years, 2) + residual_value*years)/(lifetime*(lifetime + 1))
                TXT,
                'original_cost' => <<<'TXT'
                (end_book_value_sum_of_years_digits*pow(lifetime, 2) + end_book_value_sum_of_years_digits*lifetime - 2*lifetime*residual_value*years + residual_value*pow(years, 2) - residual_value*years)/(pow(lifetime, 2) - 2*lifetime*years + lifetime + pow(years, 2) - years)
                TXT,
                'years' => <<<'TXT'
                (1/2)*(sqrt((original_cost - residual_value)*(4*end_book_value_sum_of_years_digits*pow(lifetime, 2) + 4*end_book_value_sum_of_years_digits*lifetime - 4*pow(lifetime, 2)*residual_value - 4*lifetime*residual_value + original_cost - residual_value)) + (2*lifetime + 1)*(original_cost - residual_value))/(original_cost - residual_value)
                TXT,
            ],
        ],
        [
            'title' => 'declining_balance_percents = 1 - (residual_value/original_cost)^(1/lifetime)',
            'results' => ['declining_balance_percents' => '1 - pow(residual_value/original_cost, 1/lifetime)', 'original_cost' => 'residual_value*pow(1 - declining_balance_percents, -lifetime)', 'lifetime' => 'log(residual_value/original_cost)/log(1 - declining_balance_percents)', 'residual_value' => 'original_cost*pow(1 - declining_balance_percents, lifetime)'],
        ],
        [
            'title' => 'sum_of_years_digits_expense = (original_cost - residual_value) / ((lifetime^2 +lifetime)/2) * (lifetime - years+1)',
            'results' => [
                'residual_value' => <<<'TXT'
                (-1/2*pow(lifetime, 2)*sum_of_years_digits_expense + lifetime*original_cost - 1/2*lifetime*sum_of_years_digits_expense - original_cost*years + original_cost)/(lifetime - years + 1)
                TXT,
                'lifetime' => <<<'TXT'
                (original_cost - residual_value - 1/2*sum_of_years_digits_expense + (1/2)*sqrt(4*pow(original_cost, 2) - 8*original_cost*residual_value - 8*original_cost*sum_of_years_digits_expense*years + 4*original_cost*sum_of_years_digits_expense + 4*pow(residual_value, 2) + 8*residual_value*sum_of_years_digits_expense*years - 4*residual_value*sum_of_years_digits_expense + pow(sum_of_years_digits_expense, 2)))/sum_of_years_digits_expense
                TXT,
                'original_cost' => <<<'TXT'
                ((1/2)*pow(lifetime, 2)*sum_of_years_digits_expense + lifetime*residual_value + (1/2)*lifetime*sum_of_years_digits_expense - residual_value*years + residual_value)/(lifetime - years + 1)
                TXT,
                'years' => <<<'TXT'
                (-1/2*pow(lifetime, 2)*sum_of_years_digits_expense + lifetime*original_cost - lifetime*residual_value - 1/2*lifetime*sum_of_years_digits_expense + original_cost - residual_value)/(original_cost - residual_value)
                TXT,
                'sum_of_years_digits_expense' => '2*(lifetime*original_cost - lifetime*residual_value - original_cost*years + original_cost + residual_value*years - residual_value)/(lifetime*(lifetime + 1))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Depreciation takes Depreciation method, Original cost and Salvage value and returns Depreciation expense and End book value. It is a single relationship that reads depreciation expense out of depreciation method, not a table of canned results keyed by them. Units for Depreciation expense default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Depreciation calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Depreciation: it takes 5 numbers and reports Depreciation expense, End book value and Depreciation rate.</p><p>Written with the labels from the form, End book value = (Lifetime × Original cost − Original cost × End book value after... + Salvage value × End book value after...) ÷ Lifetime.</p><p>The result panel carries Depreciation expense, End book value, Depreciation rate and Depreciation expense, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Depreciation method</strong> — a plain number, no unit</li><li><strong>Original cost</strong> — in USD. The original value or purchasing price.</li><li><strong>Salvage value</strong> — in USD. Also known as &quot;Residual value&quot;. It represents the estimated amount of money an asset will be worth at the end of its lifetime.</li><li><strong>Lifetime</strong> — in years. The estimated number of years the asset is likely to remain in service.</li><li><strong>End book value after…</strong> — in years. The year at which you would like to compute the book value of the asset.</li></ul><p>What you get back is Depreciation expense in USD, End book value in USD, Depreciation rate in percent, Depreciation expense in USD, End book value in USD, Depreciation expense in USD, End book value in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Depreciation rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>End book value</strong> = <code>(Lifetime × Original cost − Original cost × End book value after... + Salvage value × End book value after...) ÷ Lifetime</code></li><li><strong>Salvage value</strong> = <code>(End book value × Lifetime − Lifetime × Original cost + Original cost × End book value after...) ÷ End book value after...</code></li><li><strong>Lifetime</strong> = <code>End book value after... × ( − Original cost + Salvage value) ÷ (End book value − Original cost)</code></li><li><strong>Original cost</strong> = <code>(End book value × Lifetime − Salvage value × End book value after...) ÷ (Lifetime − End book value after...)</code></li><li><strong>End book value after…</strong> = <code>Lifetime × ( − End book value + Original cost) ÷ (Original cost − Salvage value)</code></li><li><strong>Depreciation rate</strong> = <code>1 − (End book value ÷ Original cost)^(1 ÷ End book value after...)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>End book value</strong> = <code>(Lifetime × Original cost − Original cost × End book value after... + Salvage value × End book value after...) ÷ Lifetime</code> — the form to use when Lifetime, Original cost, End book value after… and Salvage value are the values you have.</li><li><strong>Salvage value</strong> = <code>(End book value × Lifetime − Lifetime × Original cost + Original cost × End book value after...) ÷ End book value after...</code> — the form to use when End book value, Lifetime, Original cost and End book value after… are the values you have.</li><li><strong>Lifetime</strong> = <code>End book value after... × ( − Original cost + Salvage value) ÷ (End book value − Original cost)</code> — the form to use when End book value after…, Original cost, Salvage value and End book value are the values you have.</li><li><strong>Original cost</strong> = <code>(End book value × Lifetime − Salvage value × End book value after...) ÷ (Lifetime − End book value after...)</code> — the form to use when End book value, Lifetime, Salvage value and End book value after… are the values you have.</li><li><strong>End book value after…</strong> = <code>Lifetime × ( − End book value + Original cost) ÷ (Original cost − Salvage value)</code> — the form to use when Lifetime, End book value, Original cost and Salvage value are the values you have.</li><li><strong>End book value</strong> = <code>Original cost × (1 − Depreciation rate)^(End book value after...)</code> — the form to use when Original cost, Depreciation rate and End book value after… are the values you have.</li><li><strong>Depreciation rate</strong> = <code>1 − (End book value ÷ Original cost)^(1 ÷ End book value after...)</code> — the form to use when End book value, Original cost and End book value after… are the values you have.</li><li><strong>End book value after…</strong> = <code>ln(End book value ÷ Original cost) ÷ ln(1 − Depreciation rate)</code> — the form to use when End book value, Original cost and Depreciation rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of End book value, Salvage value and Lifetime can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Lifetime and End book value after… is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Depreciation expense, End book value and Depreciation rate are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Depreciation method left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Depreciation method is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Original cost left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Original cost is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Depreciation method to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Depreciation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Depreciation method</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Depreciation method is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Original cost</strong> takes a plain number with no unit attached. The original value or purchasing price. Change it and Salvage value, Lifetime and End book value changes with it. Fill it from a measurement rather than a memory — Original cost is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Salvage value</strong> takes a plain number with no unit attached. Also known as &quot;Residual value&quot;. It represents the estimated amount of money an asset will be worth at the end of its lifetime. Change it and Lifetime, End book value and Original cost changes with it. Fill it from a measurement rather than a memory — Salvage value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Lifetime</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The estimated number of years the asset is likely to remain in service. Change it and Salvage value, End book value and Original cost changes with it. Fill it from a measurement rather than a memory — Lifetime is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>End book value after…</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The year at which you would like to compute the book value of the asset. Change it and Salvage value, Lifetime and End book value changes with it. Fill it from a measurement rather than a memory — End book value after… is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Depreciation expense is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent and years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Depreciation method, Original cost and Salvage value is what you already know and Depreciation expense and End book value is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/heloc">HELOC Calculator</a>, <a href="/finance/hhi">Herfindahl-Hirschman index (HHI) Calculator</a> and <a href="/finance/high-low-method">High-low method Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Depreciation calculator work out?', 'a' => <<<'TXT'
            Depreciation expense, End book value, Depreciation rate and Depreciation expense, from Lifetime, Original cost, End book value after… and Salvage value. The relationship is End book value = (Lifetime × Original cost − Original cost × End book value after... + Salvage value × End book value after...) ÷ Lifetime.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Depreciation method, Original cost (USD), Salvage value (USD), Lifetime (years), End book value after… (years). Fill depreciation method, original cost and salvage value and leave Depreciation expense empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. End book value, Salvage value, Lifetime and Original cost can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Depreciation expense is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Depreciation method blank and the page solves for it, reporting Depreciation expense instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Depreciation expense keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/heloc', 'name' => 'HELOC Calculator'],
            ['path' => '/finance/hhi', 'name' => 'Herfindahl-Hirschman index (HHI) Calculator'],
            ['path' => '/finance/high-low-method', 'name' => 'High-low method Calculator'],
        ],
        'authors' => [],
    ],
];
