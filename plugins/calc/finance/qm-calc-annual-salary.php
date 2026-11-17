<?php

/**
 * Annual salary
 * /finance/annual-salary
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Annual salary',
    'meta' => ['title' => 'Annual salary Calculator — Formula, Units & Example', 'description' => 'Annual salary takes working hours per week and returns net hourly wage. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Annual salary Calculator', 'updated' => '2025-05-19'],
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
                            'label' => 'Annual salary',
                            'type' => 'number',
                            'help' => 'The yearly salary.',
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
                            'label' => 'Net annual salary',
                            'type' => 'number',
                            'help' => 'The yearly salary after taxation.',
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
            'results' => ['hours_per_week' => 'annual_income/(hourly_wage*weeks_per_year)', 'hourly_wage' => 'annual_income/(hours_per_week*weeks_per_year)', 'annual_income' => 'hourly_wage*hours_per_week*weeks_per_year', 'weeks_per_year' => 'annual_income/(hourly_wage*hours_per_week)'],
        ],
        [
            'title' => 'net_annual_income = (1-tax) * annual_income',
            'results' => ['annual_income' => '-net_annual_income/(tax - 1)', 'tax' => '(annual_income - net_annual_income)/annual_income', 'net_annual_income' => 'annual_income*(1 - tax)'],
        ],
        [
            'title' => 'net_hourly_wage = (1-tax) * hourly_wage',
            'results' => ['tax' => '(hourly_wage - net_hourly_wage)/hourly_wage', 'hourly_wage' => '-net_hourly_wage/(tax - 1)', 'net_hourly_wage' => 'hourly_wage*(1 - tax)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Working hours per week, Working weeks per year and Hourly wage into Annual salary and the answer comes back as Annual salary and Tax. The arithmetic is the whole method: annual salary is worked out from working hours per week by one formula, applied once. Annual salary comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Annual salary calculator works', 'html' => <<<'TXT'
            <p>The Annual salary calculator applies one relationship to 3 numbers and reports Annual salary, Tax and Net hourly wage.</p><p>Written with the labels from the form, Annual salary = Hourly wage × Working hours per week × Working weeks per year.</p><p>What comes back is Annual salary, Tax, Net hourly wage and Net annual salary — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Working hours per week</strong> — a plain number, no unit</li><li><strong>Working weeks per year</strong> — a plain number, no unit</li><li><strong>Hourly wage</strong> — in USD</li></ul><p>The answers come back as Annual salary in USD, Tax in percent, Net hourly wage in USD, Net annual salary in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Working hours per week = 40, Working weeks per year = 52, Hourly wage = 1000 USD, Tax = 12 perc, Net hourly wage = 100 USD and Net annual salary = 1000 USD — through the same formula and the panel reports <strong>Annual salary</strong> = 2.080e+6 USD.</p><ul><li><strong>Annual salary</strong> = 2.080e+6 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Annual salary</strong> = <code>Hourly wage × Working hours per week × Working weeks per year</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Annual salary</strong> = 2.080e+6. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Tax lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Annual salary</strong> = <code>Hourly wage × Working hours per week × Working weeks per year</code></li><li><strong>Working hours per week</strong> = <code>Annual salary ÷ (Hourly wage × Working weeks per year)</code></li><li><strong>Hourly wage</strong> = <code>Annual salary ÷ (Working hours per week × Working weeks per year)</code></li><li><strong>Working weeks per year</strong> = <code>Annual salary ÷ (Hourly wage × Working hours per week)</code></li><li><strong>Net annual salary</strong> = <code>Annual salary × (1 − Tax)</code></li><li><strong>Tax</strong> = <code>(Annual salary − Net annual salary) ÷ Annual salary</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Annual salary</strong> = <code>Hourly wage × Working hours per week × Working weeks per year</code> — the form to use when Hourly wage, Working hours per week and Working weeks per year are the values you have.</li><li><strong>Working hours per week</strong> = <code>Annual salary ÷ (Hourly wage × Working weeks per year)</code> — the form to use when Annual salary, Hourly wage and Working weeks per year are the values you have.</li><li><strong>Hourly wage</strong> = <code>Annual salary ÷ (Working hours per week × Working weeks per year)</code> — the form to use when Annual salary, Working hours per week and Working weeks per year are the values you have.</li><li><strong>Working weeks per year</strong> = <code>Annual salary ÷ (Hourly wage × Working hours per week)</code> — the form to use when Annual salary, Hourly wage and Working hours per week are the values you have.</li><li><strong>Net annual salary</strong> = <code>Annual salary × (1 − Tax)</code> — the form to use when Annual salary and Tax are the values you have.</li><li><strong>Annual salary</strong> = <code>− Net annual salary ÷ (Tax − 1)</code> — the form to use when Net annual salary and Tax are the values you have.</li><li><strong>Tax</strong> = <code>(Annual salary − Net annual salary) ÷ Annual salary</code> — the form to use when Annual salary and Net annual salary are the values you have.</li><li><strong>Net hourly wage</strong> = <code>Hourly wage × (1 − Tax)</code> — the form to use when Hourly wage and Tax are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Annual salary, Working hours per week and Hourly wage can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Working hours per week, from 40 to 80 — and the answers go from <strong>Annual salary</strong> 2.080e+6 USD to <strong>Annual salary</strong> 4.160e+6 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Annual salary, Tax and Net hourly wage are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Working hours per week left as a guess.</strong> Anything typed into Working hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Working weeks per year left as a guess.</strong> Anything typed into Working weeks per year is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hourly wage left as a guess.</strong> Anything typed into Hourly wage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Working hours per week to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Working hours per week</strong> takes a plain number with no unit attached. It feeds Hourly wage, Annual salary and Working weeks per year. Have it to hand before you start: Working hours per week is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Working weeks per year</strong> takes a plain number with no unit attached. It feeds Working hours per week, Hourly wage and Annual salary. Have it to hand before you start: Working weeks per year is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hourly wage</strong> takes a plain number with no unit attached. It feeds Working hours per week, Annual salary and Working weeks per year. Have it to hand before you start: Hourly wage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Annual salary</strong> is a plain number and the page's own defaults put it at 2.080e+6. It is worked out from Hourly wage, Working hours per week and Working weeks per year. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tax</strong> is a percent figure. It is worked out from Annual salary and Net annual salary. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net hourly wage</strong> is a plain number. It is worked out from Hourly wage and Tax. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net annual salary</strong> is a plain number. It is worked out from Annual salary and Tax. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Annual salary</th></tr></thead><tbody><tr><td><strong>Working hours per week</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Working weeks per year</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Tax</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net hourly wage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net annual salary</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Working hours per week: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Tax, Net hourly wage and Net annual salary barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Working hours per week = 20, Working weeks per year = 26, Hourly wage = 500 USD, Tax = 6 perc, Net hourly wage = 50 USD and Net annual salary = 500 USD, the answer is <strong>Annual salary</strong> = 260000 USD.</li><li>With Working hours per week = 120, Working weeks per year = 52, Hourly wage = 1000 USD, Tax = 12 perc, Net hourly wage = 100 USD and Net annual salary = 1000 USD, the answer is <strong>Annual salary</strong> = 6.240e+6 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Annual salary is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Working hours per week, Working weeks per year and Hourly wage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Working hours per week, Working weeks per year and Hourly wage measured, Annual salary and Tax wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/gdp-growth">GDP growth rate Calculator</a>, <a href="/finance/gdp-per-capita">GDP per capita Calculator</a> and <a href="/finance/gdp">GDP</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Annual salary calculator work out?', 'a' => <<<'TXT'
            Annual salary, Tax, Net hourly wage and Net annual salary, from Hourly wage, Working hours per week and Working weeks per year. The relationship is Annual salary = Hourly wage × Working hours per week × Working weeks per year.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Working hours per week, Working weeks per year, Hourly wage (USD). With working hours per week, working weeks per year and hourly wage in place, Annual salary can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Annual salary, Working hours per week, Hourly wage and Working weeks per year can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Annual salary = 2.080e+6 USD. That comes from the page\'s own defaults, entered in Working hours per week; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Annual salary is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Working hours per week left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Annual salary keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/gdp-growth', 'name' => 'GDP growth rate Calculator'],
            ['path' => '/finance/gdp-per-capita', 'name' => 'GDP per capita Calculator'],
            ['path' => '/finance/gdp', 'name' => 'GDP'],
        ],
        'authors' => [],
    ],
];
