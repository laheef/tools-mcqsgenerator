<?php

/**
 * Wage
 * /finance/wage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wage',
    'meta' => ['title' => 'Wage Calculator — Free, With Worked Examples', 'description' => 'Wage turns hourly wage and hours per week into daily wage and weekly wage. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Wage Calculator', 'updated' => '2025-10-08'],
    'sections' => [
        [
            'title' => '',
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
            ],
        ],
        [
            'title' => 'Working days',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours_per_week',
                            'label' => 'Hours per week',
                            'type' => 'number',
                            'suffix' => 'hours / week',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '40',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days_per_week',
                            'label' => 'Days per week',
                            'type' => 'number',
                            'suffix' => 'days / week',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'weekly = hourly * hours_per_week',
            'results' => ['hours_per_week' => 'weekly/hourly', 'weekly' => 'hourly*hours_per_week', 'hourly' => 'weekly/hours_per_week'],
        ],
        [
            'title' => 'daily = hourly * hours_per_week / days_per_week',
            'results' => ['hours_per_week' => 'daily*days_per_week/hourly', 'hourly' => 'daily*days_per_week/hours_per_week', 'daily' => 'hourly*hours_per_week/days_per_week', 'days_per_week' => 'hourly*hours_per_week/daily'],
        ],
        [
            'title' => 'yearly = hourly * hours_per_week * 52',
            'results' => ['hours_per_week' => '(1/52)*yearly/hourly', 'hourly' => '(1/52)*yearly/hours_per_week', 'yearly' => '52*hourly*hours_per_week'],
        ],
        [
            'title' => 'monthly = hourly * hours_per_week * 52 / 12',
            'results' => ['hours_per_week' => '(3/13)*monthly/hourly', 'hourly' => '(3/13)*monthly/hours_per_week', 'monthly' => '(13/3)*hourly*hours_per_week'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Wage turns Hourly wage and Hours per week into Daily wage and Weekly wage. The arithmetic is the whole method: daily wage is worked out from hourly wage by one formula, applied once. Daily wage comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Wage calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Wage: it takes 2 numbers and reports Daily wage, Weekly wage and Monthly wage.</p><p>In the form&#039;s own words, Weekly wage = Hourly wage × Hours per week.</p><p>What comes back is Daily wage, Weekly wage, Monthly wage and Yearly wage — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Hourly wage</strong> — in USD</li><li><strong>Hours per week</strong> — in hours / week</li></ul><p>The result boxes are Daily wage in USD, Weekly wage in USD, Monthly wage in USD, Yearly wage in USD, Days per week in days / week; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Hourly wage = 10 USD, Daily wage = 100 USD, Monthly wage = 1000 USD, Yearly wage = 10 USD, Hours per week = 40 hours / week and Days per week = 5 days / week gives <strong>Weekly wage</strong> = 400 USD.</p><ul><li><strong>Weekly wage</strong> = 400 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Weekly wage</strong> = 400 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Daily wage takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code></li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code></li><li><strong>Daily wage</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code></li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Daily wage</code></li><li><strong>Yearly wage</strong> = <code>52 × Hourly wage × Hours per week</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Weekly wage</strong> = <code>Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly wage ÷ Hourly wage</code> — the form to use when Weekly wage and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>Weekly wage ÷ Hours per week</code> — the form to use when Weekly wage and Hours per week are the values you have.</li><li><strong>Daily wage</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code> — the form to use when Hourly wage, Hours per week and Days per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Daily wage × Days per week ÷ Hourly wage</code> — the form to use when Daily wage, Days per week and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>Daily wage × Days per week ÷ Hours per week</code> — the form to use when Daily wage, Days per week and Hours per week are the values you have.</li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Daily wage</code> — the form to use when Hourly wage, Hours per week and Daily wage are the values you have.</li><li><strong>Yearly wage</strong> = <code>52 × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li></ul><p>Any one of Weekly wage, Hours per week and Hourly wage can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Hourly wage, from 10 to 20 — and the answers go from <strong>Weekly wage</strong> 400 USD to <strong>Weekly wage</strong> 800 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Daily wage, Weekly wage and Monthly wage are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Hourly wage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hourly wage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Hours per week left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hours per week is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Hourly wage and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Wage form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Hourly wage</strong> takes a plain number with no unit attached. Change it and Hours per week, Weekly wage and Daily wage changes with it. Fill it from a measurement rather than a memory — Hourly wage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Hours per week</strong> is measured in hours / week. Change it and Weekly wage, Hourly wage and Daily wage changes with it. Fill it from a measurement rather than a memory — Hours per week is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Daily wage</strong> is a plain number. It is computed from Hourly wage, Hours per week and Days per week, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Weekly wage</strong> is a plain number and the page's own defaults put it at 400. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly wage</strong> is a plain number. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Yearly wage</strong> is a plain number. It is computed from Hourly wage and Hours per week, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Days per week</strong> is a plain number. It is computed from Hourly wage, Hours per week and Daily wage, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weekly wage</th></tr></thead><tbody><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Daily wage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Monthly wage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Yearly wage</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Days per week</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Hourly wage sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Daily wage, Monthly wage and Yearly wage barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Hourly wage = 5 USD, Daily wage = 50 USD, Monthly wage = 500 USD, Yearly wage = 5 USD, Hours per week = 20 hours / week and Days per week = 2.5 days / week and the page reports <strong>Weekly wage</strong> = 100 USD.</li><li>Feed in Hourly wage = 30 USD, Daily wage = 100 USD, Monthly wage = 1000 USD, Yearly wage = 10 USD, Hours per week = 40 hours / week and Days per week = 5 days / week and the page reports <strong>Weekly wage</strong> = 1200 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Daily wage follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Hourly wage and Hours per week are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Hourly wage and Hours per week measured, Daily wage and Weekly wage wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/options-spread">Options spread</a>, <a href="/finance/overtime">Overtime Calculator</a> and <a href="/finance/overtime-paycheck">Overtime paycheck</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wage calculator work out?', 'a' => 'Daily wage, Weekly wage, Monthly wage and Yearly wage, from Hourly wage and Hours per week. The relationship is Weekly wage = Hourly wage × Hours per week.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Hourly wage (USD), Hours per week (hours / week). Fill hourly wage and hours per week and leave Daily wage empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Weekly wage, Hours per week, Hourly wage and Daily wage blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Weekly wage = 400 USD. That comes from the page\'s own defaults, entered in Hourly wage; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Daily wage is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Hourly wage blank and the page solves for it, reporting Daily wage instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Daily wage at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/options-spread', 'name' => 'Options spread'],
            ['path' => '/finance/overtime', 'name' => 'Overtime Calculator'],
            ['path' => '/finance/overtime-paycheck', 'name' => 'Overtime paycheck'],
        ],
        'authors' => [],
    ],
];
