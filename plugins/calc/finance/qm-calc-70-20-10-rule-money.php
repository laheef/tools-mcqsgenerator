<?php

/**
 * 70/20/10 rule money
 * /finance/70-20-10-rule-money
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '70/20/10 rule money',
    'meta' => ['title' => '70/20/10 rule money: Formula, Steps & Results', 'description' => '70/20/10 rule money takes income frequency and returns total essentials (70%). A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => '70/20/10 rule money Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interval',
                            'label' => 'Income frequency',
                            'type' => 'select',
                            'options' => ['Monthly' => '1', 'Annual' => '12'],
                            'dataset' => 'Payment Interval',
                            'help' => 'Select whether the income amount you entered is monthly or annual. We’ll use this to calculate your monthly budget.',
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income',
                            'label' => 'After-tax income',
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
                            'name' => 'needs',
                            'label' => 'Total essentials (70%)',
                            'type' => 'number',
                            'suffix' => '/ month',
                            'help' => 'This is the amount you should allocate to essential living expenses, including rent, food, utilities, transportation, and other necessities.',
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
                            'name' => 'details',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show essential costs by category' => '1', '' => '0'],
                            'dataset' => 'details',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'housing',
                            'label' => 'Housing',
                            'type' => 'number',
                            'suffix' => '/ month',
                            'help' => 'Rent or mortgage payments, property taxes, etc.',
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
                            'name' => 'food',
                            'label' => 'Food',
                            'type' => 'number',
                            'suffix' => '/ month',
                            'help' => 'Groceries and dining out.',
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
                            'name' => 'transportation',
                            'label' => 'Transportation',
                            'type' => 'number',
                            'suffix' => '/ month',
                            'help' => 'Public transport, car payments, fuel, etc.',
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
                            'name' => 'utilities',
                            'label' => 'Utilities',
                            'type' => 'number',
                            'suffix' => '/ month',
                            'help' => 'Electricity, water, internet, mobile, etc.',
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
                            'suffix' => '/ month',
                            'help' => 'Health, home, or auto insurance.',
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
                            'name' => 'savings',
                            'label' => 'Savings & debt (20%)',
                            'type' => 'number',
                            'suffix' => '/ month',
                            'help' => 'This portion should be used for saving money or paying off debt, such as emergency funds, retirement savings, loan repayments, or financial goals.',
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
                            'name' => 'investments',
                            'label' => 'Lifestyle/investments (10%)',
                            'type' => 'number',
                            'suffix' => '/ month',
                            'help' => 'This is the amount you can use for discretionary spending, investments, entertainment, hobbies, and other personal interests.',
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
            'title' => 'needs = (income / interval) * 0.7',
            'results' => ['interval' => '(7/10)*income/needs', 'needs' => '(7/10)*income/interval', 'income' => '(10/7)*interval*needs'],
        ],
        [
            'title' => 'housing = needs * 0.4',
            'results' => ['needs' => '(5/2)*housing', 'housing' => '(2/5)*needs'],
        ],
        [
            'title' => 'food = needs * 0.2',
            'results' => ['needs' => '5*food', 'food' => '(1/5)*needs'],
        ],
        [
            'title' => 'transportation = needs * 0.15',
            'results' => ['transportation' => '(3/20)*needs', 'needs' => '(20/3)*transportation'],
        ],
        [
            'title' => 'utilities = needs * 0.15',
            'results' => ['utilities' => '(3/20)*needs', 'needs' => '(20/3)*utilities'],
        ],
        [
            'title' => 'insurance = needs * 0.1',
            'results' => ['needs' => '10*insurance', 'insurance' => '(1/10)*needs'],
        ],
        [
            'title' => 'savings = (income/interval) * 0.2',
            'results' => ['interval' => '(1/5)*income/savings', 'savings' => '(1/5)*income/interval', 'income' => '5*interval*savings'],
        ],
        [
            'title' => 'investments = (income/interval) * 0.1',
            'results' => ['investments' => '(1/10)*income/interval', 'interval' => '(1/10)*income/investments', 'income' => '10*interval*investments'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        70/20/10 rule money turns Income frequency and After-tax income into Total essentials (70%) and Housing. Nothing is looked up on this page: total essentials (70%) is computed from income frequency and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Total essentials (70%) is opened in / month; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the 70/20/10 rule money calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind 70/20/10 rule money: it takes 2 numbers and reports Total essentials (70%), Housing and Food.</p><p>The relationship it solves reads Total essentials (70%) = (7 ÷ 10) × After-tax income ÷ Income frequency.</p><p>The answers are Total essentials (70%), Housing, Food and Transportation; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Income frequency</strong> — a plain number, no unit. Select whether the income amount you entered is monthly or annual. We’ll use this to calculate your monthly budget.</li><li><strong>After-tax income</strong> — in USD</li></ul><p>The result boxes are Total essentials (70%) in / month, Housing in / month, Food in / month, Transportation in / month, Utilities in / month, Insurance in / month, Savings &amp; debt (20%) in / month, Lifestyle/investments (10%) in / month; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Details = 0 gives <strong>Income frequency</strong> = 1.</p><ul><li><strong>Income frequency</strong> = 1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Total essentials (70%)</strong> = <code>(7 ÷ 10) × After-tax income ÷ Income frequency</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Income frequency</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Total essentials (70%) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total essentials (70%)</strong> = <code>(7 ÷ 10) × After-tax income ÷ Income frequency</code></li><li><strong>Income frequency</strong> = <code>(7 ÷ 10) × After-tax income ÷ Total essentials (70%)</code></li><li><strong>After-tax income</strong> = <code>(10 ÷ 7) × Income frequency × Total essentials (70%)</code></li><li><strong>Housing</strong> = <code>(2 ÷ 5) × Total essentials (70%)</code></li><li><strong>Food</strong> = <code>(1 ÷ 5) × Total essentials (70%)</code></li><li><strong>Transportation</strong> = <code>(3 ÷ 20) × Total essentials (70%)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total essentials (70%)</strong> = <code>(7 ÷ 10) × After-tax income ÷ Income frequency</code> — the form to use when After-tax income and Income frequency are the values you have.</li><li><strong>Income frequency</strong> = <code>(7 ÷ 10) × After-tax income ÷ Total essentials (70%)</code> — the form to use when After-tax income and Total essentials (70%) are the values you have.</li><li><strong>After-tax income</strong> = <code>(10 ÷ 7) × Income frequency × Total essentials (70%)</code> — the form to use when Income frequency and Total essentials (70%) are the values you have.</li><li><strong>Housing</strong> = <code>(2 ÷ 5) × Total essentials (70%)</code> — the form to use when Total essentials (70%) are the values you have.</li><li><strong>Total essentials (70%)</strong> = <code>(5 ÷ 2) × Housing</code> — the form to use when Housing are the values you have.</li><li><strong>Food</strong> = <code>(1 ÷ 5) × Total essentials (70%)</code> — the form to use when Total essentials (70%) are the values you have.</li><li><strong>Total essentials (70%)</strong> = <code>5 × Food</code> — the form to use when Food are the values you have.</li><li><strong>Transportation</strong> = <code>(3 ÷ 20) × Total essentials (70%)</code> — the form to use when Total essentials (70%) are the values you have.</li></ul><p>Any one of Total essentials (70%), Income frequency and After-tax income can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total essentials (70%), Housing and Food are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Income frequency left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Income frequency is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>After-tax income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If After-tax income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Income frequency and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the 70/20/10 rule money form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Income frequency</strong> takes a plain number with no unit attached. Select whether the income amount you entered is monthly or annual. We’ll use this to calculate your monthly budget. It feeds Total essentials (70%), After-tax income and Savings & debt (20%). This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Income frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>After-tax income</strong> takes a plain number with no unit attached. It feeds Income frequency, Total essentials (70%) and Savings & debt (20%). Fill it from a measurement rather than a memory — After-tax income is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 8 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total essentials (70%)</strong> is a plain number. It is computed from After-tax income and Income frequency, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Housing</strong> is a plain number. It is computed from Total essentials (70%), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Food</strong> is a plain number. It is computed from Total essentials (70%), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Transportation</strong> is a plain number. It is computed from Total essentials (70%), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Utilities</strong> is a plain number. It is computed from Total essentials (70%), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Insurance</strong> is a plain number. It is computed from Total essentials (70%), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Savings &amp; debt (20%)</strong> is a plain number. It is computed from After-tax income and Income frequency, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Lifestyle/investments (10%)</strong> is a plain number. It is computed from After-tax income and Income frequency, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Details = 0 and the page reports <strong>Income frequency</strong> = 1.</li><li>Feed in Details = 0 and the page reports <strong>Income frequency</strong> = 1.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total essentials (70%) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Income frequency and After-tax income measured, Total essentials (70%) and Housing wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/sales-commission">Sales commission Calculator</a>, <a href="/finance/sales-tax">Sales tax Calculator</a> and <a href="/finance/sales">Sales</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 70/20/10 rule money calculator work out?', 'a' => <<<'TXT'
            Total essentials (70%), Housing, Food and Transportation, from After-tax income and Income frequency. The relationship is Total essentials (70%) = (7 ÷ 10) × After-tax income ÷ Income frequency.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Income frequency, After-tax income (USD). Enter income frequency and after-tax income; Total essentials (70%) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total essentials (70%), Income frequency, After-tax income and Housing blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Income frequency = 1. That comes from the page\'s own defaults, entered in Income frequency; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total essentials (70%) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Income frequency blank and the page solves for it, reporting Total essentials (70%) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Total essentials (70%) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/sales-commission', 'name' => 'Sales commission Calculator'],
            ['path' => '/finance/sales-tax', 'name' => 'Sales tax Calculator'],
            ['path' => '/finance/sales', 'name' => 'Sales'],
        ],
        'authors' => [],
    ],
];
