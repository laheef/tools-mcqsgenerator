<?php

/**
 * Hourly to annual salary
 * /finance/hourly-to-annual-salary
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hourly to annual salary',
    'meta' => ['title' => 'Hourly to annual salary — Formula & Results', 'description' => 'Hourly to annual salary works out monthly pay and per week and reports both. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Hourly to annual salary Calculator', 'updated' => '2025-10-08'],
    'sections' => [
        [
            'title' => 'Data',
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
                            'name' => 'hours_per_week',
                            'label' => 'Hours per week',
                            'type' => 'number',
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
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
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
                            'name' => 'yearly',
                            'label' => 'Annual salary',
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
                            'name' => 'monthly',
                            'label' => 'Monthly pay',
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
                            'name' => 'weekly',
                            'label' => 'Per week',
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
                            'label' => 'Per day',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
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
            'results' => ['hours_per_week' => 'weekly/hourly', 'weekly' => 'hourly*hours_per_week', 'hourly' => 'weekly/hours_per_week'],
        ],
        [
            'title' => 'daily = hourly * hours_per_week / days_per_week',
            'results' => ['daily' => 'hourly*hours_per_week/days_per_week', 'hours_per_week' => 'daily*days_per_week/hourly', 'days_per_week' => 'hourly*hours_per_week/daily', 'hourly' => 'daily*days_per_week/hours_per_week'],
        ],
        [
            'title' => 'yearly = hourly * hours_per_week * 52',
            'results' => ['yearly' => '52*hourly*hours_per_week', 'hours_per_week' => '(1/52)*yearly/hourly', 'hourly' => '(1/52)*yearly/hours_per_week'],
        ],
        [
            'title' => 'monthly = hourly * hours_per_week * 52 / 12',
            'results' => ['hours_per_week' => '(3/13)*monthly/hourly', 'monthly' => '(13/3)*hourly*hours_per_week', 'hourly' => '(3/13)*monthly/hours_per_week'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Hourly wage and Hours per week into Hourly to annual salary and the answer comes back as Days per week and Annual salary. The arithmetic is the whole method: days per week is worked out from hourly wage by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Hourly to annual salary calculator works', 'html' => <<<'TXT'
            <p>The Hourly to annual salary calculator applies one relationship to 2 numbers and reports Days per week, Annual salary and Monthly pay.</p><p>Written with the labels from the form, Per week = Hourly wage × Hours per week.</p><p>What comes back is Days per week, Annual salary, Monthly pay and Per week — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Hourly wage</strong> — in USD</li><li><strong>Hours per week</strong> — a plain number, no unit</li></ul><p>The answers come back as Days per week, Annual salary in USD, Monthly pay in USD, Per week in USD, Per day in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Hourly wage = 10 USD, Hours per week = 40, Days per week = 5, Annual salary = 10 USD, Monthly pay = 100 USD and Per day = 1000 USD — through the same formula and the panel reports <strong>Per week</strong> = 400 USD.</p><ul><li><strong>Per week</strong> = 400 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Per week</strong> = <code>Hourly wage × Hours per week</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Per week</strong> = 400. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Days per week is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Per week</strong> = <code>Hourly wage × Hours per week</code></li><li><strong>Hours per week</strong> = <code>Per week ÷ Hourly wage</code></li><li><strong>Hourly wage</strong> = <code>Per week ÷ Hours per week</code></li><li><strong>Per day</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code></li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Per day</code></li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Per week</strong> = <code>Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Per week ÷ Hourly wage</code> — the form to use when Per week and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>Per week ÷ Hours per week</code> — the form to use when Per week and Hours per week are the values you have.</li><li><strong>Per day</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code> — the form to use when Hourly wage, Hours per week and Days per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Per day × Days per week ÷ Hourly wage</code> — the form to use when Per day, Days per week and Hourly wage are the values you have.</li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Per day</code> — the form to use when Hourly wage, Hours per week and Per day are the values you have.</li><li><strong>Hourly wage</strong> = <code>Per day × Days per week ÷ Hours per week</code> — the form to use when Per day, Days per week and Hours per week are the values you have.</li><li><strong>Annual salary</strong> = <code>52 × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li></ul><p>Any one of Per week, Hours per week and Hourly wage can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Hourly wage, from 10 to 20 — and the answers go from <strong>Per week</strong> 400 USD to <strong>Per week</strong> 800 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Days per week, Annual salary and Monthly pay are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Hourly wage left as a guess.</strong> Anything typed into Hourly wage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hours per week left as a guess.</strong> Anything typed into Hours per week is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Hourly wage to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Hourly to annual salary form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Hourly wage</strong> takes a plain number with no unit attached. Change it and Hours per week, Per week and Per day changes with it. Fill it from a measurement rather than a memory — Hourly wage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Hours per week</strong> takes a plain number with no unit attached. Change it and Per week, Hourly wage and Per day changes with it. Fill it from a measurement rather than a memory — Hours per week is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Days per week</strong> is a plain number. The value follows from Hourly wage, Hours per week and Per day. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Annual salary</strong> is a plain number. The value follows from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly pay</strong> is a plain number. The value follows from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Per week</strong> is a plain number and the page's own defaults put it at 400. The value follows from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Per day</strong> is a plain number. The value follows from Hourly wage, Hours per week and Days per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Per week</th></tr></thead><tbody><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Days per week</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Annual salary</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Monthly pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Per day</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Hourly wage: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Days per week, Annual salary and Monthly pay barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Hourly wage = 5 USD, Hours per week = 20, Days per week = 2.5, Annual salary = 5 USD, Monthly pay = 50 USD and Per day = 500 USD and the page reports <strong>Per week</strong> = 100 USD.</li><li>Feed in Hourly wage = 30 USD, Hours per week = 40, Days per week = 5, Annual salary = 10 USD, Monthly pay = 100 USD and Per day = 1000 USD and the page reports <strong>Per week</strong> = 1200 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Days per week is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Hourly wage and Hours per week are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Hourly wage and Hours per week is what you already know and Days per week and Annual salary is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/annual-income">Annual income Calculator</a>, <a href="/finance/annual-pay">Annual pay Calculator</a> and <a href="/finance/annual-salary">Annual salary Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hourly to annual salary calculator work out?', 'a' => 'Days per week, Annual salary, Monthly pay and Per week, from Hourly wage and Hours per week. The relationship is Per week = Hourly wage × Hours per week.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hourly wage (USD), Hours per week. Fill hourly wage and hours per week and leave Days per week empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Per week, Hours per week, Hourly wage and Per day blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Per week = 400 USD. The figures come from Hourly wage as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Days per week is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Hourly wage blank and the page solves for it, reporting Days per week instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Days per week at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/annual-income', 'name' => 'Annual income Calculator'],
            ['path' => '/finance/annual-pay', 'name' => 'Annual pay Calculator'],
            ['path' => '/finance/annual-salary', 'name' => 'Annual salary Calculator'],
        ],
        'authors' => [],
    ],
];
