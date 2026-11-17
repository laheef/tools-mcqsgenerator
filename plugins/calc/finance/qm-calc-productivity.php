<?php

/**
 * Productivity
 * /finance/productivity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Productivity',
    'meta' => ['title' => 'Productivity Calculator — Formula & Results', 'description' => 'Productivity works out ‍ Revenue per employee and revenue per working hour and reports both. Every box can be solved for, not only the one in the title.', 'h1' => 'Productivity Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue',
                            'label' => 'Revenue',
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
            'title' => 'Productivity per employee',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_employee',
                            'label' => 'Number of employees',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue_per_employee',
                            'label' => '‍ Revenue per employee',
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
            'title' => 'Productivity per hour',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_working_hours',
                            'label' => 'Number of working hours',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'per_hour',
                            'label' => ' Revenue per working hour',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'per_hour = revenue / number_of_working_hours',
            'results' => ['revenue' => 'number_of_working_hours*per_hour', 'per_hour' => 'revenue/number_of_working_hours', 'number_of_working_hours' => 'revenue/per_hour'],
        ],
        [
            'title' => 'revenue_per_employee = revenue / number_of_employee ',
            'results' => ['revenue' => 'number_of_employee*revenue_per_employee', 'revenue_per_employee' => 'revenue/number_of_employee', 'number_of_employee' => 'revenue/revenue_per_employee'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Productivity turns Revenue and Number of working hours into Number of employees and ‍ Revenue per employee. It is a single relationship that reads number of employees out of revenue, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Productivity calculator works', 'html' => <<<'TXT'
            <p>The Productivity calculator applies one relationship to 2 numbers and reports Number of employees, ‍ Revenue per employee and Revenue per working hour.</p><p>In the form&#039;s own words, Revenue per working hour = Revenue ÷ Number of working hours.</p><p>The result panel carries Number of employees, ‍ Revenue per employee and Revenue per working hour, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Revenue</strong> — in USD</li><li><strong>Number of working hours</strong> — in hours</li></ul><p>The answers come back as Number of employees, ‍ Revenue per employee in USD, Revenue per working hour in hours. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Revenue = 10 USD, Number of employees = 100, ‍ Revenue per employee = 1000 USD and Number of working hours = 10 hrs — through the same formula and the panel reports <strong>Revenue per working hour</strong> = 1 hrs.</p><ul><li><strong>Revenue per working hour</strong> = 1 hrs</li></ul><p>The line behind those figures is <strong>Revenue per working hour</strong> = <code>Revenue ÷ Number of working hours</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Revenue per working hour</strong> = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Revenue per working hour offers 8 units and opens on hours, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Revenue per working hour</strong> = <code>Revenue ÷ Number of working hours</code></li><li><strong>Revenue</strong> = <code>Number of working hours × Revenue per working hour</code></li><li><strong>Number of working hours</strong> = <code>Revenue ÷ Revenue per working hour</code></li><li><strong>‍ Revenue per employee</strong> = <code>Revenue ÷ Number of employees</code></li><li><strong>Number of employees</strong> = <code>Revenue ÷ ‍ Revenue per employee</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Revenue per working hour</strong> = <code>Revenue ÷ Number of working hours</code> — the form to use when Revenue and Number of working hours are the values you have.</li><li><strong>Revenue</strong> = <code>Number of working hours × Revenue per working hour</code> — the form to use when Number of working hours and Revenue per working hour are the values you have.</li><li><strong>Number of working hours</strong> = <code>Revenue ÷ Revenue per working hour</code> — the form to use when Revenue and Revenue per working hour are the values you have.</li><li><strong>‍ Revenue per employee</strong> = <code>Revenue ÷ Number of employees</code> — the form to use when Revenue and Number of employees are the values you have.</li><li><strong>Revenue</strong> = <code>Number of employees × ‍ Revenue per employee</code> — the form to use when Number of employees and ‍ Revenue per employee are the values you have.</li><li><strong>Number of employees</strong> = <code>Revenue ÷ ‍ Revenue per employee</code> — the form to use when Revenue and ‍ Revenue per employee are the values you have.</li></ul><p>Any one of Revenue per working hour, Revenue and Number of working hours can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Revenue from 10 to 20, leaving every other box alone. The panel moves from <strong>Revenue per working hour</strong> 1 hrs to <strong>Revenue per working hour</strong> 2 hrs.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Number of working hours is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Number of employees, ‍ Revenue per employee and Revenue per working hour are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Revenue left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Revenue is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of working hours left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of working hours is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Revenue to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Productivity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Revenue</strong> takes a plain number with no unit attached. Change it and Revenue per working hour, Number of working hours and ‍ Revenue per employee changes with it. Fill it from a measurement rather than a memory — Revenue is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of working hours</strong> is a hours quantity: the page opens it in hrs and converts anything else you pick before the formula runs. Change it and Revenue and Revenue per working hour changes with it. Fill it from a measurement rather than a memory — Number of working hours is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Number of employees</strong> is a plain number. The value follows from Revenue and ‍ Revenue per employee. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>‍ Revenue per employee</strong> is a plain number. The value follows from Revenue and Number of employees. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Revenue per working hour</strong> is a hours figure and the page's own defaults put it at 1 hrs. The value follows from Revenue and Number of working hours. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Revenue per working hour</th></tr></thead><tbody><tr><td><strong>Revenue</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of employees</strong> +10%</td><td>+0%</td></tr><tr><td><strong>‍ Revenue per employee</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of working hours</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Revenue sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Number of employees and ‍ Revenue per employee barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Revenue = 5 USD, Number of employees = 50, ‍ Revenue per employee = 500 USD and Number of working hours = 5 hrs and the page reports <strong>Revenue per working hour</strong> = 1 hrs.</li><li>Feed in Revenue = 30 USD, Number of employees = 100, ‍ Revenue per employee = 1000 USD and Number of working hours = 10 hrs and the page reports <strong>Revenue per working hour</strong> = 3 hrs.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Productivity actually offers.</p><ul><li><strong>hours</strong> — opens in <em>hrs</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Number of employees follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover hours. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Revenue and Number of working hours is what you already know and Number of employees and ‍ Revenue per employee is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/gold-melt">Gold melt Calculator</a>, <a href="/finance/goodwill">Goodwill Calculator</a> and <a href="/finance/google-adsense">Google AdSense Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Productivity calculator work out?', 'a' => <<<'TXT'
            Number of employees, ‍ Revenue per employee and Revenue per working hour, from Revenue and Number of working hours. The relationship is Revenue per working hour = Revenue ÷ Number of working hours.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Revenue (USD), Number of working hours (hours). Fill revenue and number of working hours and leave Number of employees empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Revenue per working hour, Revenue, Number of working hours and ‍ Revenue per employee blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Revenue per working hour = 1 hrs. That comes from the page\'s own defaults, entered in Revenue; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Number of employees is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Revenue blank and the page solves for it, reporting Number of employees instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Number of employees keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/gold-melt', 'name' => 'Gold melt Calculator'],
            ['path' => '/finance/goodwill', 'name' => 'Goodwill Calculator'],
            ['path' => '/finance/google-adsense', 'name' => 'Google AdSense Calculator'],
        ],
        'authors' => [],
    ],
];
