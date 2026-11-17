<?php

/**
 * Yearly wage
 * /finance/yearly-wage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Yearly wage',
    'meta' => ['title' => 'Yearly wage Calculator: Formula, Steps & Examples', 'description' => 'Yearly wage works out net hourly wage from working hours per week and working weeks per year. Results come back in USD, with any other unit a click away.', 'h1' => 'Yearly wage Calculator', 'updated' => '2024-03-05'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'hours_per_week',
                            'label' => 'Working hours per week',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
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
                            'label' => 'Yearly wage',
                            'type' => 'number',
                            'help' => 'The annual income.',
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
                    'columns' => 2,
                    'place' => [0, 1],
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
                        [
                            'name' => 'net_annual_income',
                            'label' => 'Net yearly wage',
                            'type' => 'number',
                            'help' => 'The net annual income.',
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
            'results' => ['tax' => '(annual_income - net_annual_income)/annual_income', 'net_annual_income' => 'annual_income*(1 - tax)', 'annual_income' => '-net_annual_income/(tax - 1)'],
        ],
        [
            'title' => 'net_hourly_wage = (1-tax) * hourly_wage ',
            'results' => ['net_hourly_wage' => 'hourly_wage*(1 - tax)', 'tax' => '(hourly_wage - net_hourly_wage)/hourly_wage', 'hourly_wage' => '-net_hourly_wage/(tax - 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Yearly wage works out Yearly wage and Tax from Working hours per week, Working weeks per year and Hourly wage. It is a single relationship that reads yearly wage out of working hours per week, not a table of canned results keyed by them. Units for Yearly wage default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Yearly wage calculator works', 'html' => <<<'TXT'
            <p>Yearly wage answers one question from 3 numbers, and the answer is Yearly wage, Tax and Net hourly wage.</p><p>Written with the labels from the form, Yearly wage = Hourly wage × Working hours per week × Working weeks per year.</p><p>The result panel carries Yearly wage, Tax, Net hourly wage and Net yearly wage, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Working hours per week</strong> — a plain number, no unit</li><li><strong>Working weeks per year</strong> — a plain number, no unit</li><li><strong>Hourly wage</strong> — in USD</li></ul><p>The result boxes are Yearly wage in USD, Tax in percent, Net hourly wage in USD, Net yearly wage in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Working hours per week = 40, Working weeks per year = 52, Hourly wage = 1000 USD, Tax = 12 perc, Net hourly wage = 100 USD and Net yearly wage = 1000 USD; the answers are <strong>Yearly wage</strong> = 2.080e+6 USD.</p><ul><li><strong>Yearly wage</strong> = 2.080e+6 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Yearly wage</strong> = <code>Hourly wage × Working hours per week × Working weeks per year</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Yearly wage</strong> = 2.080e+6. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Tax lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Yearly wage</strong> = <code>Hourly wage × Working hours per week × Working weeks per year</code></li><li><strong>Working weeks per year</strong> = <code>Yearly wage ÷ (Hourly wage × Working hours per week)</code></li><li><strong>Hourly wage</strong> = <code>Yearly wage ÷ (Working hours per week × Working weeks per year)</code></li><li><strong>Working hours per week</strong> = <code>Yearly wage ÷ (Hourly wage × Working weeks per year)</code></li><li><strong>Net yearly wage</strong> = <code>Yearly wage × (1 − Tax)</code></li><li><strong>Tax</strong> = <code>(Yearly wage − Net yearly wage) ÷ Yearly wage</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Yearly wage</strong> = <code>Hourly wage × Working hours per week × Working weeks per year</code> — the form to use when Hourly wage, Working hours per week and Working weeks per year are the values you have.</li><li><strong>Working weeks per year</strong> = <code>Yearly wage ÷ (Hourly wage × Working hours per week)</code> — the form to use when Yearly wage, Hourly wage and Working hours per week are the values you have.</li><li><strong>Hourly wage</strong> = <code>Yearly wage ÷ (Working hours per week × Working weeks per year)</code> — the form to use when Yearly wage, Working hours per week and Working weeks per year are the values you have.</li><li><strong>Working hours per week</strong> = <code>Yearly wage ÷ (Hourly wage × Working weeks per year)</code> — the form to use when Yearly wage, Hourly wage and Working weeks per year are the values you have.</li><li><strong>Net yearly wage</strong> = <code>Yearly wage × (1 − Tax)</code> — the form to use when Yearly wage and Tax are the values you have.</li><li><strong>Tax</strong> = <code>(Yearly wage − Net yearly wage) ÷ Yearly wage</code> — the form to use when Yearly wage and Net yearly wage are the values you have.</li><li><strong>Yearly wage</strong> = <code>− Net yearly wage ÷ (Tax − 1)</code> — the form to use when Net yearly wage and Tax are the values you have.</li><li><strong>Net hourly wage</strong> = <code>Hourly wage × (1 − Tax)</code> — the form to use when Hourly wage and Tax are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Yearly wage, Working weeks per year and Hourly wage can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Working hours per week from 40 to 80, leaving every other box alone. The panel moves from <strong>Yearly wage</strong> 2.080e+6 USD to <strong>Yearly wage</strong> 4.160e+6 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Yearly wage, Tax and Net hourly wage are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Working hours per week left as a guess.</strong> Anything typed into Working hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Working weeks per year left as a guess.</strong> Anything typed into Working weeks per year is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hourly wage left as a guess.</strong> Anything typed into Hourly wage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Working hours per week and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Yearly wage form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Working hours per week</strong> takes a plain number with no unit attached. It feeds Working weeks per year, Hourly wage and Yearly wage. Fill it from a measurement rather than a memory — Working hours per week is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Working weeks per year</strong> takes a plain number with no unit attached. It feeds Hourly wage, Yearly wage and Working hours per week. Fill it from a measurement rather than a memory — Working weeks per year is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Hourly wage</strong> takes a plain number with no unit attached. It feeds Working weeks per year, Yearly wage and Working hours per week. Fill it from a measurement rather than a memory — Hourly wage is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Yearly wage</strong> is a plain number and the page's own defaults put it at 2.080e+6. It is worked out from Hourly wage, Working hours per week and Working weeks per year. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Tax</strong> is a percent figure. It is worked out from Yearly wage and Net yearly wage. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Net hourly wage</strong> is a plain number. It is worked out from Hourly wage and Tax. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Net yearly wage</strong> is a plain number. It is worked out from Yearly wage and Tax. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Yearly wage</th></tr></thead><tbody><tr><td><strong>Working hours per week</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Working weeks per year</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Tax</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net hourly wage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Net yearly wage</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Working hours per week: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Tax, Net hourly wage and Net yearly wage barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Working hours per week = 20, Working weeks per year = 26, Hourly wage = 500 USD, Tax = 6 perc, Net hourly wage = 50 USD and Net yearly wage = 500 USD and the page reports <strong>Yearly wage</strong> = 260000 USD.</li><li>Feed in Working hours per week = 120, Working weeks per year = 52, Hourly wage = 1000 USD, Tax = 12 perc, Net hourly wage = 100 USD and Net yearly wage = 1000 USD and the page reports <strong>Yearly wage</strong> = 6.240e+6 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Yearly wage actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Yearly wage is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Working hours per week, Working weeks per year and Hourly wage is what you already know and Yearly wage and Tax is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/profit">Profit Calculator</a>, <a href="/finance/profitability-index">Profitability index Calculator</a> and <a href="/finance/prorated-rent">Prorated rent Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Yearly wage calculator work out?', 'a' => <<<'TXT'
            Yearly wage, Tax, Net hourly wage and Net yearly wage, from Hourly wage, Working hours per week and Working weeks per year. The relationship is Yearly wage = Hourly wage × Working hours per week × Working weeks per year.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Working hours per week, Working weeks per year, Hourly wage (USD). Enter working hours per week, working weeks per year and hourly wage; Yearly wage is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Yearly wage, Working weeks per year, Hourly wage and Working hours per week can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Yearly wage = 2.080e+6 USD. Those are the defaults written into the form — move Working hours per week and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Yearly wage is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Working hours per week blank and the page solves for it, reporting Yearly wage instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Yearly wage keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/profit', 'name' => 'Profit Calculator'],
            ['path' => '/finance/profitability-index', 'name' => 'Profitability index Calculator'],
            ['path' => '/finance/prorated-rent', 'name' => 'Prorated rent Calculator'],
        ],
        'authors' => [],
    ],
];
