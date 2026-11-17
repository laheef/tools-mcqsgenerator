<?php

/**
 * Annual pay
 * /finance/annual-pay
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Annual pay',
    'meta' => ['title' => 'Annual pay Calculator — Formula, Units & Example', 'description' => 'Annual pay works out net hourly wage from working hours per week and working weeks per year. Every box can be solved for, not only the one in the title.', 'h1' => 'Annual pay Calculator', 'updated' => '2024-07-27'],
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
                            'label' => 'Annual pay',
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
                            'label' => 'Net annual pay',
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
            'results' => ['weeks_per_year' => 'annual_income/(hourly_wage*hours_per_week)', 'hourly_wage' => 'annual_income/(hours_per_week*weeks_per_year)', 'annual_income' => 'hourly_wage*hours_per_week*weeks_per_year', 'hours_per_week' => 'annual_income/(hourly_wage*weeks_per_year)'],
        ],
        [
            'title' => 'net_annual_income = (1-tax) * annual_income',
            'results' => ['annual_income' => '-net_annual_income/(tax - 1)', 'tax' => '(annual_income - net_annual_income)/annual_income', 'net_annual_income' => 'annual_income*(1 - tax)'],
        ],
        [
            'title' => 'net_hourly_wage = (1-tax) * hourly_wage',
            'results' => ['hourly_wage' => '-net_hourly_wage/(tax - 1)', 'tax' => '(hourly_wage - net_hourly_wage)/hourly_wage', 'net_hourly_wage' => 'hourly_wage*(1 - tax)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Annual pay works out Annual pay and Tax from Working hours per week, Working weeks per year and Hourly wage. The arithmetic is the whole method: annual pay is worked out from working hours per week by one formula, applied once. Annual pay comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Annual pay calculator works', 'html' => <<<'TXT'
            <p>Annual pay answers one question from 3 numbers, and the answer is Annual pay, Tax and Net hourly wage.</p><p>The relationship it solves reads Annual pay = Hourly wage × Working hours per week × Working weeks per year.</p><p>What comes back is Annual pay, Tax, Net hourly wage and Net annual pay — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Working hours per week</strong> — a plain number, no unit</li><li><strong>Working weeks per year</strong> — a plain number, no unit</li><li><strong>Hourly wage</strong> — in USD</li></ul><p>The result boxes are Annual pay in USD, Tax in percent, Net hourly wage in USD, Net annual pay in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Working hours per week = 40, Working weeks per year = 52, Hourly wage = 1000 USD, Tax = 12 perc, Net hourly wage = 100 USD and Net annual pay = 1000 USD — through the same formula and the panel reports <strong>Annual pay</strong> = 2.080e+6 USD.</p><ul><li><strong>Annual pay</strong> = 2.080e+6 USD</li></ul><p>That is <strong>Annual pay</strong> = <code>Hourly wage × Working hours per week × Working weeks per year</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Annual pay</strong> = 2.080e+6. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Tax lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Annual pay</strong> = <code>Hourly wage × Working hours per week × Working weeks per year</code></li><li><strong>Working weeks per year</strong> = <code>Annual pay ÷ (Hourly wage × Working hours per week)</code></li><li><strong>Hourly wage</strong> = <code>Annual pay ÷ (Working hours per week × Working weeks per year)</code></li><li><strong>Working hours per week</strong> = <code>Annual pay ÷ (Hourly wage × Working weeks per year)</code></li><li><strong>Net annual pay</strong> = <code>Annual pay × (1 − Tax)</code></li><li><strong>Tax</strong> = <code>(Annual pay − Net annual pay) ÷ Annual pay</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Annual pay</strong> = <code>Hourly wage × Working hours per week × Working weeks per year</code> — the form to use when Hourly wage, Working hours per week and Working weeks per year are the values you have.</li><li><strong>Working weeks per year</strong> = <code>Annual pay ÷ (Hourly wage × Working hours per week)</code> — the form to use when Annual pay, Hourly wage and Working hours per week are the values you have.</li><li><strong>Hourly wage</strong> = <code>Annual pay ÷ (Working hours per week × Working weeks per year)</code> — the form to use when Annual pay, Working hours per week and Working weeks per year are the values you have.</li><li><strong>Working hours per week</strong> = <code>Annual pay ÷ (Hourly wage × Working weeks per year)</code> — the form to use when Annual pay, Hourly wage and Working weeks per year are the values you have.</li><li><strong>Net annual pay</strong> = <code>Annual pay × (1 − Tax)</code> — the form to use when Annual pay and Tax are the values you have.</li><li><strong>Annual pay</strong> = <code>− Net annual pay ÷ (Tax − 1)</code> — the form to use when Net annual pay and Tax are the values you have.</li><li><strong>Tax</strong> = <code>(Annual pay − Net annual pay) ÷ Annual pay</code> — the form to use when Annual pay and Net annual pay are the values you have.</li><li><strong>Net hourly wage</strong> = <code>Hourly wage × (1 − Tax)</code> — the form to use when Hourly wage and Tax are the values you have.</li></ul><p>Any one of Annual pay, Working weeks per year and Hourly wage can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Working hours per week, from 40 to 80 — and the answers go from <strong>Annual pay</strong> 2.080e+6 USD to <strong>Annual pay</strong> 4.160e+6 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Annual pay, Tax and Net hourly wage are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Working hours per week left as a guess.</strong> Anything typed into Working hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Working weeks per year left as a guess.</strong> Anything typed into Working weeks per year is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hourly wage left as a guess.</strong> Anything typed into Hourly wage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Working hours per week and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Annual pay form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Working hours per week</strong> takes a plain number with no unit attached. The page reads it when it works out Working weeks per year, Hourly wage and Annual pay. Fill it from a measurement rather than a memory — Working hours per week is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Working weeks per year</strong> takes a plain number with no unit attached. The page reads it when it works out Hourly wage, Annual pay and Working hours per week. Fill it from a measurement rather than a memory — Working weeks per year is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Hourly wage</strong> takes a plain number with no unit attached. The page reads it when it works out Working weeks per year, Annual pay and Working hours per week. Fill it from a measurement rather than a memory — Hourly wage is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Annual pay</strong> is a plain number and the page's own defaults put it at 2.080e+6. The value follows from Hourly wage, Working hours per week and Working weeks per year. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Tax</strong> is a percent figure. The value follows from Annual pay and Net annual pay. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net hourly wage</strong> is a plain number. The value follows from Hourly wage and Tax. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Net annual pay</strong> is a plain number. The value follows from Annual pay and Tax. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Annual pay</th></tr></thead><tbody><tr><td><strong>Working hours per week</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Working weeks per year</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Tax</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net hourly wage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net annual pay</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Working hours per week: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Tax, Net hourly wage and Net annual pay barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Working hours per week = 20, Working weeks per year = 26, Hourly wage = 500 USD, Tax = 6 perc, Net hourly wage = 50 USD and Net annual pay = 500 USD and the page reports <strong>Annual pay</strong> = 260000 USD.</li><li>Feed in Working hours per week = 120, Working weeks per year = 52, Hourly wage = 1000 USD, Tax = 12 perc, Net hourly wage = 100 USD and Net annual pay = 1000 USD and the page reports <strong>Annual pay</strong> = 6.240e+6 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Annual pay actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Annual pay is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Working hours per week, Working weeks per year and Hourly wage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Working hours per week, Working weeks per year and Hourly wage measured, Annual pay and Tax wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/fica-tax">FICA tax Calculator</a>, <a href="/finance/fifo-for-inventories">FIFO for inventories</a> and <a href="/finance/finance-charge">Finance charge</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Annual pay calculator work out?', 'a' => <<<'TXT'
            Annual pay, Tax, Net hourly wage and Net annual pay, from Hourly wage, Working hours per week and Working weeks per year. The relationship is Annual pay = Hourly wage × Working hours per week × Working weeks per year.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Working hours per week, Working weeks per year, Hourly wage (USD). Enter working hours per week, working weeks per year and hourly wage; Annual pay is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Annual pay, Working weeks per year, Hourly wage and Working hours per week blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Annual pay = 2.080e+6 USD. That comes from the page\'s own defaults, entered in Working hours per week; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Annual pay is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Working hours per week blank and the page solves for it, reporting Annual pay instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Annual pay keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/fica-tax', 'name' => 'FICA tax Calculator'],
            ['path' => '/finance/fifo-for-inventories', 'name' => 'FIFO for inventories'],
            ['path' => '/finance/finance-charge', 'name' => 'Finance charge'],
        ],
        'authors' => [],
    ],
];
