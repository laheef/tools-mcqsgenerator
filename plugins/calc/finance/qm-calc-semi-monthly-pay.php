<?php

/**
 * Semi-monthly pay
 * /finance/semi-monthly-pay
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Semi-monthly pay',
    'meta' => ['title' => 'Semi-monthly pay — Formula, Steps & Examples', 'description' => 'Semi-monthly pay works out daily wage from hourly wage and hours per week. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Semi-monthly pay Calculator', 'updated' => '2025-10-08'],
    'sections' => [
        [
            'title' => 'Input any of the wages below to obtain the answer',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hourly',
                            'label' => 'Hourly wage',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daily',
                            'label' => 'Daily wage',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weekly',
                            'label' => 'Weekly wage',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly',
                            'label' => 'Monthly wage',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yearly',
                            'label' => 'Yearly wage',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours_per_week',
                            'label' => 'Hours per week',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '40',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Are you sure this is the number of hours per week? This is more than 12 daily hours from Monday to Saturday.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_per_week',
                            'label' => 'Days per week',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Answer',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'semi_monthly',
                            'label' => 'Semi-monthly wage',
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
            'title' => 'weekly = hourly * hours_per_week',
            'results' => ['hourly' => 'weekly/hours_per_week', 'weekly' => 'hourly*hours_per_week', 'hours_per_week' => 'weekly/hourly'],
        ],
        [
            'title' => 'daily = hourly * hours_per_week / days_per_week',
            'results' => ['hourly' => 'daily*days_per_week/hours_per_week', 'days_per_week' => 'hourly*hours_per_week/daily', 'hours_per_week' => 'daily*days_per_week/hourly', 'daily' => 'hourly*hours_per_week/days_per_week'],
        ],
        [
            'title' => 'yearly = hourly * hours_per_week * 52',
            'results' => ['hourly' => '(1/52)*yearly/hours_per_week', 'yearly' => '52*hourly*hours_per_week', 'hours_per_week' => '(1/52)*yearly/hourly'],
        ],
        [
            'title' => 'monthly = hourly * hours_per_week * 52 / 12',
            'results' => ['hourly' => '(3/13)*monthly/hours_per_week', 'monthly' => '(13/3)*hourly*hours_per_week', 'hours_per_week' => '(3/13)*monthly/hourly'],
        ],
        [
            'title' => 'semi_monthly = (hourly * hours_per_week * 52 / 12)/2',
            'results' => ['hourly' => '(6/13)*semi_monthly/hours_per_week', 'hours_per_week' => '(6/13)*semi_monthly/hourly', 'semi_monthly' => '(13/6)*hourly*hours_per_week'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Semi-monthly pay takes Hourly wage and Hours per week and returns Daily wage and Weekly wage. There is no hidden constant here: change daily wage and hourly wage moves with it. The main result, Daily wage, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Semi-monthly pay calculator works', 'html' => <<<'TXT'
            <p>Semi-monthly pay answers one question from 2 numbers, and the answer is Daily wage, Weekly wage and Monthly wage.</p><p>The relationship it solves reads Weekly wage = Hourly wage × Hours per week.</p><p>The answers are Daily wage, Weekly wage, Monthly wage and Yearly wage; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Hourly wage</strong> — in USD</li><li><strong>Hours per week</strong> — in hours</li></ul><p>The answers come back as Daily wage in USD, Weekly wage in USD, Monthly wage in USD, Yearly wage in USD, Days per week in days, Semi-monthly wage in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Hourly wage = 10 USD, Daily wage = 100 USD, Monthly wage = 1000 USD, Yearly wage = 10 USD, Hours per week = 40 hrs, Days per week = 5 days and Semi-monthly wage = 10 USD; the answers are <strong>Weekly wage</strong> = 400 USD.</p><ul><li><strong>Weekly wage</strong> = 400 USD</li></ul><p>The line behind those figures is <strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Weekly wage</strong> = 400 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Days per week offers 6 units and opens on days, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code></li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code></li><li><strong>Daily wage</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code></li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Daily wage</code></li><li><strong>Yearly wage</strong> = <code>52 × Hourly wage × Hours per week</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code> — the form to use when Weekly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code> — the form to use when Weekly wage and Hourly wage are the values you have.</li><li><strong>Daily wage</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code> — the form to use when Hourly wage, Hours per week and Days per week are the values you have.</li><li><strong>Hourly wage</strong> = <code>Daily wage × Days per week ÷ Hours per week</code> — the form to use when Daily wage, Days per week and Hours per week are the values you have.</li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Daily wage</code> — the form to use when Hourly wage, Hours per week and Daily wage are the values you have.</li><li><strong>Hours per week</strong> = <code>Daily wage × Days per week ÷ Hourly wage</code> — the form to use when Daily wage, Days per week and Hourly wage are the values you have.</li><li><strong>Yearly wage</strong> = <code>52 × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Weekly wage, Hourly wage and Hours per week can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Hourly wage from 10 to 20, leaving every other box alone. The panel moves from <strong>Weekly wage</strong> 400 USD to <strong>Weekly wage</strong> 800 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Hours per week is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Daily wage, Weekly wage and Monthly wage are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Hourly wage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hourly wage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Hours per week left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hours per week is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Hourly wage is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Semi-monthly pay form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Hourly wage</strong> takes a plain number with no unit attached. Change it and Weekly wage, Hours per week and Days per week changes with it. Fill it from a measurement rather than a memory — Hourly wage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Hours per week</strong> is a hours quantity: the page opens it in hrs and converts anything else you pick before the formula runs. Change it and Hourly wage, Weekly wage and Days per week changes with it. Fill it from a measurement rather than a memory — Hours per week is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Daily wage</strong> is a plain number. It is worked out from Hourly wage, Hours per week and Days per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Weekly wage</strong> is a plain number and the page's own defaults put it at 400. It is worked out from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly wage</strong> is a plain number. It is worked out from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Yearly wage</strong> is a plain number. It is worked out from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Days per week</strong> is a days figure. It is worked out from Hourly wage, Hours per week and Daily wage. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Semi-monthly wage</strong> is a plain number. It is worked out from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weekly wage</th></tr></thead><tbody><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Daily wage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Monthly wage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Yearly wage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Days per week</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Semi-monthly wage</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Hourly wage sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Daily wage, Monthly wage and Yearly wage barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Hourly wage = 5 USD, Daily wage = 50 USD, Monthly wage = 500 USD, Yearly wage = 5 USD, Hours per week = 20 hrs, Days per week = 2.5 days and Semi-monthly wage = 5 USD and the page reports <strong>Weekly wage</strong> = 100 USD.</li><li>Feed in Hourly wage = 30 USD, Daily wage = 100 USD, Monthly wage = 1000 USD, Yearly wage = 10 USD, Hours per week = 40 hrs, Days per week = 5 days and Semi-monthly wage = 10 USD and the page reports <strong>Weekly wage</strong> = 1200 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Semi-monthly pay actually offers.</p><ul><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos, yrs and sec. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Daily wage follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are days and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Hourly wage and Hours per week are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Hourly wage and Hours per week and the number you are missing is Daily wage and Weekly wage.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/sales-commission">Sales commission Calculator</a>, <a href="/finance/sales-tax">Sales tax Calculator</a> and <a href="/finance/sales">Sales</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Semi-monthly pay calculator work out?', 'a' => 'Daily wage, Weekly wage, Monthly wage and Yearly wage, from Hourly wage and Hours per week. The relationship is Weekly wage = Hourly wage × Hours per week.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hourly wage (USD), Hours per week (hours). Enter hourly wage and hours per week; Daily wage is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Weekly wage, Hourly wage, Hours per week and Daily wage can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Weekly wage = 400 USD. Those are the defaults written into the form — move Hourly wage and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Daily wage is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Hourly wage blank and the page solves for it, reporting Daily wage instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Daily wage at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/sales-commission', 'name' => 'Sales commission Calculator'],
            ['path' => '/finance/sales-tax', 'name' => 'Sales tax Calculator'],
            ['path' => '/finance/sales', 'name' => 'Sales'],
        ],
        'authors' => [],
    ],
];
