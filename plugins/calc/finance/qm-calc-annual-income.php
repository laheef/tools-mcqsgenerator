<?php

/**
 * Annual income
 * /finance/annual-income
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Annual income',
    'meta' => ['title' => 'Annual income Calculator — Formula & Results', 'description' => 'Annual income works out net hourly wage from working hours per week and working weeks per year. Results come back in USD, with any other unit a click away.', 'h1' => 'Annual income Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours_per_week',
                            'label' => 'Working hours per week',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weeks_per_year',
                            'label' => 'Working weeks per year',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '52',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hourly_wage',
                            'label' => 'Hourly wage',
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
                            'name' => 'annual_income',
                            'label' => 'Annual income',
                            'type' => 'number',
                            'help' => 'Total yearly salary.',
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
            'title' => 'Net salary',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax',
                            'label' => 'Tax',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_hourly_wage',
                            'label' => 'Net hourly wage',
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
                            'name' => 'net_annual_income',
                            'label' => 'Net annual income',
                            'type' => 'number',
                            'help' => 'How much of your yearly salary remains after taxation.',
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
            'title' => 'annual_income = hourly_wage * hours_per_week * weeks_per_year',
            'results' => ['weeks_per_year' => 'annual_income/(hourly_wage*hours_per_week)', 'hours_per_week' => 'annual_income/(hourly_wage*weeks_per_year)', 'hourly_wage' => 'annual_income/(hours_per_week*weeks_per_year)', 'annual_income' => 'hourly_wage*hours_per_week*weeks_per_year'],
        ],
        [
            'title' => 'net_annual_income = (1-tax) * annual_income',
            'results' => ['annual_income' => '-net_annual_income/(tax - 1)', 'net_annual_income' => 'annual_income*(1 - tax)', 'tax' => '(annual_income - net_annual_income)/annual_income'],
        ],
        [
            'title' => 'net_hourly_wage = (1-tax) * hourly_wage',
            'results' => ['hourly_wage' => '-net_hourly_wage/(tax - 1)', 'net_hourly_wage' => 'hourly_wage*(1 - tax)', 'tax' => '(hourly_wage - net_hourly_wage)/hourly_wage'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Annual income turns Working hours per week, Working weeks per year and Hourly wage into Annual income and Tax. The arithmetic is the whole method: annual income is worked out from working hours per week by one formula, applied once. Annual income comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Annual income calculator works', 'html' => <<<'TXT'
            <p>Annual income answers one question from 3 numbers, and the answer is Annual income, Tax and Net hourly wage.</p><p>The relationship it solves reads Annual income = Hourly wage × Working hours per week × Working weeks per year.</p><p>What comes back is Annual income, Tax, Net hourly wage and Net annual income — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Working hours per week</strong> — a plain number, no unit</li><li><strong>Working weeks per year</strong> — a plain number, no unit</li><li><strong>Hourly wage</strong> — in USD</li></ul><p>What you get back is Annual income in USD, Tax in percent, Net hourly wage in USD, Net annual income in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Working hours per week = 40, Working weeks per year = 52, Hourly wage = 1000 USD, Tax = 12 perc, Net hourly wage = 100 USD and Net annual income = 1000 USD — through the same formula and the panel reports <strong>Annual income</strong> = 2.080e+6 USD.</p><ul><li><strong>Annual income</strong> = 2.080e+6 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Annual income</strong> = <code>Hourly wage × Working hours per week × Working weeks per year</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Annual income</strong> = 2.080e+6 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Tax offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Annual income</strong> = <code>Hourly wage × Working hours per week × Working weeks per year</code></li><li><strong>Working weeks per year</strong> = <code>Annual income ÷ (Hourly wage × Working hours per week)</code></li><li><strong>Working hours per week</strong> = <code>Annual income ÷ (Hourly wage × Working weeks per year)</code></li><li><strong>Hourly wage</strong> = <code>Annual income ÷ (Working hours per week × Working weeks per year)</code></li><li><strong>Net annual income</strong> = <code>Annual income × (1 − Tax)</code></li><li><strong>Tax</strong> = <code>(Annual income − Net annual income) ÷ Annual income</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Annual income</strong> = <code>Hourly wage × Working hours per week × Working weeks per year</code> — the form to use when Hourly wage, Working hours per week and Working weeks per year are the values you have.</li><li><strong>Working weeks per year</strong> = <code>Annual income ÷ (Hourly wage × Working hours per week)</code> — the form to use when Annual income, Hourly wage and Working hours per week are the values you have.</li><li><strong>Working hours per week</strong> = <code>Annual income ÷ (Hourly wage × Working weeks per year)</code> — the form to use when Annual income, Hourly wage and Working weeks per year are the values you have.</li><li><strong>Hourly wage</strong> = <code>Annual income ÷ (Working hours per week × Working weeks per year)</code> — the form to use when Annual income, Working hours per week and Working weeks per year are the values you have.</li><li><strong>Net annual income</strong> = <code>Annual income × (1 − Tax)</code> — the form to use when Annual income and Tax are the values you have.</li><li><strong>Annual income</strong> = <code>− Net annual income ÷ (Tax − 1)</code> — the form to use when Net annual income and Tax are the values you have.</li><li><strong>Tax</strong> = <code>(Annual income − Net annual income) ÷ Annual income</code> — the form to use when Annual income and Net annual income are the values you have.</li><li><strong>Net hourly wage</strong> = <code>Hourly wage × (1 − Tax)</code> — the form to use when Hourly wage and Tax are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Annual income, Working weeks per year and Working hours per week can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Working hours per week, from 40 to 80 — and the answers go from <strong>Annual income</strong> 2.080e+6 USD to <strong>Annual income</strong> 4.160e+6 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Annual income, Tax and Net hourly wage are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Working hours per week left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Working hours per week is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Working weeks per year left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Working weeks per year is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Hourly wage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hourly wage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Working hours per week is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Working hours per week</strong> takes a plain number with no unit attached. It feeds Working weeks per year, Hourly wage and Annual income. Have it to hand before you start: Working hours per week is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Working weeks per year</strong> takes a plain number with no unit attached. It feeds Working hours per week, Hourly wage and Annual income. Have it to hand before you start: Working weeks per year is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hourly wage</strong> takes a plain number with no unit attached. It feeds Working weeks per year, Working hours per week and Annual income. Have it to hand before you start: Hourly wage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Annual income</strong> is a plain number and the page's own defaults put it at 2.080e+6. It is worked out from Hourly wage, Working hours per week and Working weeks per year. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Tax</strong> is a percent figure. It is worked out from Annual income and Net annual income. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Net hourly wage</strong> is a plain number. It is worked out from Hourly wage and Tax. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Net annual income</strong> is a plain number. It is worked out from Annual income and Tax. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Annual income</th></tr></thead><tbody><tr><td><strong>Working hours per week</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Working weeks per year</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Tax</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net hourly wage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net annual income</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Working hours per week sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Tax, Net hourly wage and Net annual income barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Working hours per week = 20, Working weeks per year = 26, Hourly wage = 500 USD, Tax = 6 perc, Net hourly wage = 50 USD and Net annual income = 500 USD, the answer is <strong>Annual income</strong> = 260000 USD.</li><li>With Working hours per week = 120, Working weeks per year = 52, Hourly wage = 1000 USD, Tax = 12 perc, Net hourly wage = 100 USD and Net annual income = 1000 USD, the answer is <strong>Annual income</strong> = 6.240e+6 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Annual income follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Working hours per week, Working weeks per year and Hourly wage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Working hours per week, Working weeks per year and Hourly wage measured, Annual income and Tax wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/what-to-offer-on-a-house">What to offer on a house Calculator</a>, <a href="/finance/working-capital">Working capital Calculator</a> and <a href="/finance/working-capital-turnover-ratio">Working capital turnover ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Annual income calculator work out?', 'a' => <<<'TXT'
            Annual income, Tax, Net hourly wage and Net annual income, from Hourly wage, Working hours per week and Working weeks per year. The relationship is Annual income = Hourly wage × Working hours per week × Working weeks per year.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Working hours per week, Working weeks per year, Hourly wage (USD). With working hours per week, working weeks per year and hourly wage in place, Annual income can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Annual income, Working weeks per year, Working hours per week and Hourly wage can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Annual income = 2.080e+6 USD. Those are the defaults written into the form — move Working hours per week and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Annual income is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Working hours per week left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Annual income at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/what-to-offer-on-a-house', 'name' => 'What to offer on a house Calculator'],
            ['path' => '/finance/working-capital', 'name' => 'Working capital Calculator'],
            ['path' => '/finance/working-capital-turnover-ratio', 'name' => 'Working capital turnover ratio Calculator'],
        ],
        'authors' => [],
    ],
];
