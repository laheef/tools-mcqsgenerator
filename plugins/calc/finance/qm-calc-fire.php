<?php

/**
 * FIRE (financial independence, retire early)
 * /finance/fire
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'FIRE (financial independence, retire early)',
    'meta' => ['title' => 'FIRE (financial independence, retire early)', 'description' => 'Enter current age, age of retiring and current income and FIRE (financial independence, retire early) returns years of saving and years on retirement.', 'h1' => 'FIRE (financial independence, retire early) Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => 'Retirement planning inputs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_age',
                            'label' => 'Current age',
                            'type' => 'number',
                            'help' => 'How old are you?',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'age_of_retiring',
                            'label' => 'Age of retiring',
                            'type' => 'number',
                            'help' => 'When do you want to stop working?',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n',
                            'label' => 'Years of saving',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_income',
                            'label' => 'Current income',
                            'type' => 'number',
                            'help' => 'What is your current income?',
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
                            'name' => 'expenses',
                            'label' => 'Expenses',
                            'type' => 'number',
                            'help' => 'What is your estimated level of expenses?',
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
                            'name' => 'current_savings',
                            'label' => 'Current savings',
                            'type' => 'number',
                            'help' => 'How much money do you have on your savings accounts?',
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
                            'name' => 'r',
                            'label' => 'Savings rate of return',
                            'type' => 'number',
                            'help' => 'This could be the interest rate on a savings account or the rate of return when investing the savings.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Salary growth rate or inflation',
                            'type' => 'number',
                            'help' => 'This rate indicates how much your salary is increasing. Over the long term, growth is assumed to be like inflation rate growth.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.5',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amount required for financial independence',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'life_expectancy',
                            'label' => 'Your life expectancy',
                            'type' => 'number',
                            'help' => 'Life expectancy is set to 80 years by default, but you can adjust it to the age you prefer.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '80',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm',
                            'label' => 'Years on retirement',
                            'type' => 'number',
                            'help' => 'This field shows how many years you want to be financially independent.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount_required',
                            'label' => 'Total amount required',
                            'type' => 'number',
                            'help' => 'Refers to the total amount you need for your retirement.',
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
                        ['type' => 'note', 'text' => 'You already have enough savings for the financial independence!'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'To achieve financial independence',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yearly_savings',
                            'label' => 'You need to save yearly',
                            'type' => 'number',
                            'help' => 'Amount of money you have to save per year.',
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
                            'name' => 'share_of_income',
                            'label' => 'Which is ',
                            'type' => 'number',
                            'suffix' => '% of your income',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'n =  age_of_retiring - current_age ',
            'results' => ['current_age' => 'age_of_retiring - n', 'age_of_retiring' => 'current_age + n', 'n' => 'age_of_retiring - current_age'],
        ],
        [
            'title' => 'm = life_expectancy- age_of_retiring',
            'results' => ['m' => '-age_of_retiring + life_expectancy', 'age_of_retiring' => 'life_expectancy - m', 'life_expectancy' => 'age_of_retiring + m'],
        ],
        [
            'title' => 'yearly_savings = amount_required * (r - g + 0.00000000001) / ((1 + r + 0.00000000001) ^ n - (1 + g) ^ n)',
            'results' => ['amount_required' => 'pow(10, 11 - 11*n)*yearly_savings*(-pow(100000000000*g + 100000000000, n) + pow(100000000000*r + 100000000001, n))/(-100000000000*g + 100000000000*r + 1)', 'yearly_savings' => <<<'TXT'
            (1/100000000000)*amount_required*(pow(10, 11*n + 11)*g - pow(10, 11*n + 11)*r - pow(100000000000, n))/(pow(100000000000, n)*pow(g + 1, n) - pow(100000000000*r + 100000000001, n))
            TXT],
        ],
        [
            'title' => 'share_of_income / 100 = yearly_savings / current_income',
            'results' => ['share_of_income' => '100*yearly_savings/current_income', 'yearly_savings' => '(1/100)*current_income*share_of_income', 'current_income' => '100*yearly_savings/share_of_income'],
        ],
        [
            'title' => <<<'TXT'
            amount_required = (expenses * (1 + g) ^ m) * (1 - ((1+g)/(1+r + 0.00000000001))^m) / (1 - (1+g)/(1+r + 0.00000000001)) - current_savings * (1 + r + 0.00000000001) ^ n
            TXT,
            'results' => ['amount_required' => <<<'TXT'
            pow(100000000000, -n)*(-pow(10, 11*n + 11)*expenses*r*pow(100000000000*(g + 1)/(100000000000*r + 100000000001), m)*pow(g + 1, m) + pow(10, 11*n + 11)*expenses*r*pow(g + 1, m) - 100000000001*pow(100000000000, n)*expenses*pow(100000000000*(g + 1)/(100000000000*r + 100000000001), m)*pow(g + 1, m) + 100000000001*pow(100000000000, n)*expenses*pow(g + 1, m) + 100000000000*current_savings*g*pow(100000000000*r + 100000000001, n) - 100000000000*current_savings*r*pow(100000000000*r + 100000000001, n) - current_savings*pow(100000000000*r + 100000000001, n))/(-100000000000*g + 100000000000*r + 1)
            TXT, 'current_savings' => <<<'TXT'
            pow(100000000000*r + 100000000001, -n)*(pow(10, 11*n + 11)*amount_required*g - pow(10, 11*n + 11)*amount_required*r - pow(10, 11*n + 11)*expenses*r*pow(100000000000*(g + 1)/(100000000000*r + 100000000001), m)*pow(g + 1, m) + pow(10, 11*n + 11)*expenses*r*pow(g + 1, m) - pow(100000000000, n)*amount_required - 100000000001*pow(100000000000, n)*expenses*pow(100000000000*(g + 1)/(100000000000*r + 100000000001), m)*pow(g + 1, m) + 100000000001*pow(100000000000, n)*expenses*pow(g + 1, m))/(-100000000000*g + 100000000000*r + 1)
            TXT, 'expenses' => <<<'TXT'
            pow(100000000000, -n)*pow(g + 1, -m)*(pow(10, 11*n + 11)*amount_required*g - pow(10, 11*n + 11)*amount_required*r - pow(100000000000, n)*amount_required + 100000000000*current_savings*g*pow(100000000000*r + 100000000001, n) - 100000000000*current_savings*r*pow(100000000000*r + 100000000001, n) - current_savings*pow(100000000000*r + 100000000001, n))/(100000000000*r*pow(100000000000*(g + 1)/(100000000000*r + 100000000001), m) - 100000000000*r + 100000000001*pow(100000000000*(g + 1)/(100000000000*r + 100000000001), m) - 100000000001)
            TXT, 'n' => <<<'TXT'
            log((100000000000*amount_required*g - 100000000000*amount_required*r - amount_required - 100000000000*expenses*r*pow(100000000000*(g + 1)/(100000000000*r + 100000000001), m)*pow(g + 1, m) + 100000000000*expenses*r*pow(g + 1, m) - 100000000001*expenses*pow(100000000000*(g + 1)/(100000000000*r + 100000000001), m)*pow(g + 1, m) + 100000000001*expenses*pow(g + 1, m))/(current_savings*(-100000000000*g + 100000000000*r + 1)))/log(r + 100000000001/100000000000)
            TXT],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Current age and Age of retiring into FIRE (financial independence, retire early) and the answer comes back as Years of saving and Current income. There is no hidden constant here: change years of saving and current age moves with it. The main result, Years of saving, is reported in years.
        TXT,
        'sections' => [
            ['title' => 'How the FIRE (financial independence, retire early) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind FIRE (financial independence, retire early): it takes 2 numbers and reports Years of saving, Current income and Expenses.</p><p>The relationship it solves reads Years of saving = Age of retiring − Current age.</p><p>The result panel carries Years of saving, Current income, Expenses and Current savings, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Current age</strong> — in years. How old are you?</li><li><strong>Age of retiring</strong> — in years. When do you want to stop working?</li></ul><p>What you get back is Years of saving in years, Current income in USD, Expenses in USD, Current savings in USD, Your life expectancy in years, Years on retirement in years, Total amount required in USD, You need to save yearly in USD, Which is in % of your income, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Years of saving lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Years of saving</strong> = <code>Age of retiring − Current age</code></li><li><strong>Current age</strong> = <code>Age of retiring − Years of saving</code></li><li><strong>Age of retiring</strong> = <code>Current age + Years of saving</code></li><li><strong>Years on retirement</strong> = <code>− Age of retiring + Your life expectancy</code></li><li><strong>Your life expectancy</strong> = <code>Age of retiring + Years on retirement</code></li><li><strong>Which is</strong> = <code>100 × You need to save yearly ÷ Current income</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Years of saving</strong> = <code>Age of retiring − Current age</code> — the form to use when Age of retiring and Current age are the values you have.</li><li><strong>Current age</strong> = <code>Age of retiring − Years of saving</code> — the form to use when Age of retiring and Years of saving are the values you have.</li><li><strong>Age of retiring</strong> = <code>Current age + Years of saving</code> — the form to use when Current age and Years of saving are the values you have.</li><li><strong>Years on retirement</strong> = <code>− Age of retiring + Your life expectancy</code> — the form to use when Age of retiring and Your life expectancy are the values you have.</li><li><strong>Age of retiring</strong> = <code>Your life expectancy − Years on retirement</code> — the form to use when Your life expectancy and Years on retirement are the values you have.</li><li><strong>Your life expectancy</strong> = <code>Age of retiring + Years on retirement</code> — the form to use when Age of retiring and Years on retirement are the values you have.</li><li><strong>Which is</strong> = <code>100 × You need to save yearly ÷ Current income</code> — the form to use when You need to save yearly and Current income are the values you have.</li><li><strong>You need to save yearly</strong> = <code>(1 ÷ 100) × Current income × Which is</code> — the form to use when Current income and Which is are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Years of saving, Current age and Age of retiring can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Current age and Age of retiring carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Years of saving, Current income and Expenses are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current age left as a guess.</strong> Anything typed into Current age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Age of retiring left as a guess.</strong> Anything typed into Age of retiring is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Current age and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the FIRE (financial independence, retire early) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current age</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. How old are you?. Change it and Age of retiring and Years of saving changes with it. Fill it from a measurement rather than a memory — Current age is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Age of retiring</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. When do you want to stop working?. Change it and Current age, Years of saving and Years on retirement changes with it. Fill it from a measurement rather than a memory — Age of retiring is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Years of saving</strong> is a years figure. It is computed from Age of retiring and Current age, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Current income</strong> is a plain number. It is computed from You need to save yearly and Which is, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Expenses</strong> is a plain number. It is computed from Years of saving, Salary growth rate or inflation, Years on retirement and Total amount required, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Current savings</strong> is a plain number. It is computed from Savings rate of return, Years of saving, Total amount required and Salary growth rate or inflation, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Your life expectancy</strong> is a years figure. It is computed from Age of retiring and Years on retirement, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Years on retirement</strong> is a years figure. It is computed from Age of retiring and Your life expectancy, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total amount required</strong> is a plain number. It is computed from Years of saving, You need to save yearly, Salary growth rate or inflation and Savings rate of return, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>You need to save yearly</strong> is a plain number. It is computed from Total amount required, Years of saving, Salary growth rate or inflation and Savings rate of return, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Which is</strong> is a plain number. It is computed from You need to save yearly and Current income, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on FIRE (financial independence, retire early) actually offers.</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Years of saving is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Current age and Age of retiring are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current age and Age of retiring measured, Years of saving and Current income wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/lerner-index">Lerner index</a>, <a href="/finance/levered-free-cash-flow">Levered free cash flow Calculator</a> and <a href="/finance/lifetime-earnings">Lifetime earnings Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the FIRE (financial independence, retire early) calculator work out?', 'a' => <<<'TXT'
            Years of saving, Current income, Expenses and Current savings, from Age of retiring and Current age. The relationship is Years of saving = Age of retiring − Current age.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current age (years), Age of retiring (years). Enter current age and age of retiring; Years of saving is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Years of saving, Current age, Age of retiring and Years on retirement can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Years of saving is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Current age blank and the page solves for it, reporting Years of saving instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Years of saving keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/lerner-index', 'name' => 'Lerner index'],
            ['path' => '/finance/levered-free-cash-flow', 'name' => 'Levered free cash flow Calculator'],
            ['path' => '/finance/lifetime-earnings', 'name' => 'Lifetime earnings Calculator'],
        ],
        'authors' => [],
    ],
];
