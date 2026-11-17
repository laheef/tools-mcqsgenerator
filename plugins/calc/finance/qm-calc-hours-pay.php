<?php

/**
 * Hours pay
 * /finance/hours-pay
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hours pay',
    'meta' => ['title' => 'Hours pay Calculator: Formula, Steps & Examples', 'description' => 'Hours pay works out daily pay and weekly pay from hours per week, days per week and hourly wage. Every box can be solved for, not only the one in the title.', 'h1' => 'Hours pay Calculator', 'updated' => '2025-10-08'],
    'sections' => [
        [
            'title' => 'Pay information',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daily',
                            'label' => 'Daily pay',
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
                            'label' => 'Weekly pay',
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
                            'name' => 'yearly',
                            'label' => 'Annual pay',
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
            'title' => 'Working hours',
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
        [
            'title' => 'Result',
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
    'article' => [
        'intro' => <<<'TXT'
        Hours pay takes Hours per week and Hourly wage and returns Daily pay and Weekly pay. The arithmetic is the whole method: daily pay is worked out from hours per week by one formula, applied once. Daily pay comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Hours pay calculator works', 'html' => <<<'TXT'
            <p>Hours pay answers one question from 2 numbers, and the answer is Daily pay, Weekly pay and Monthly pay.</p><p>The relationship it solves reads Weekly pay = Hourly wage × Hours per week.</p><p>What comes back is Daily pay, Weekly pay, Monthly pay and Annual pay — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Hours per week</strong> — in hours / week</li><li><strong>Hourly wage</strong> — in USD</li></ul><p>What you get back is Daily pay in USD, Weekly pay in USD, Monthly pay in USD, Annual pay in USD, Days per week in days / week, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Daily pay = 10 USD, Monthly pay = 100 USD, Annual pay = 1000 USD, Hours per week = 40 hours / week, Days per week = 5 days / week and Hourly wage = 1000 USD — through the same formula and the panel reports <strong>Weekly pay</strong> = 40000 USD.</p><ul><li><strong>Weekly pay</strong> = 40000 USD</li></ul><p>The line behind those figures is <strong>Weekly pay</strong> = <code>Hourly wage × Hours per week</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Weekly pay</strong> = 40000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Daily pay takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Weekly pay</strong> = <code>Hourly wage × Hours per week</code></li><li><strong>Hours per week</strong> = <code>Weekly pay ÷ Hourly wage</code></li><li><strong>Hourly wage</strong> = <code>Weekly pay ÷ Hours per week</code></li><li><strong>Daily pay</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code></li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Daily pay</code></li><li><strong>Annual pay</strong> = <code>52 × Hourly wage × Hours per week</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Weekly pay</strong> = <code>Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly pay ÷ Hourly wage</code> — the form to use when Weekly pay and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>Weekly pay ÷ Hours per week</code> — the form to use when Weekly pay and Hours per week are the values you have.</li><li><strong>Daily pay</strong> = <code>Hourly wage × Hours per week ÷ Days per week</code> — the form to use when Hourly wage, Hours per week and Days per week are the values you have.</li><li><strong>Hours per week</strong> = <code>Daily pay × Days per week ÷ Hourly wage</code> — the form to use when Daily pay, Days per week and Hourly wage are the values you have.</li><li><strong>Hourly wage</strong> = <code>Daily pay × Days per week ÷ Hours per week</code> — the form to use when Daily pay, Days per week and Hours per week are the values you have.</li><li><strong>Days per week</strong> = <code>Hourly wage × Hours per week ÷ Daily pay</code> — the form to use when Hourly wage, Hours per week and Daily pay are the values you have.</li><li><strong>Annual pay</strong> = <code>52 × Hourly wage × Hours per week</code> — the form to use when Hourly wage and Hours per week are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Weekly pay, Hours per week and Hourly wage can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Daily pay, from 10 to 20 — and the answers go from <strong>Weekly pay</strong> 40000 USD to <strong>Weekly pay</strong> 40000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Daily pay, Weekly pay and Monthly pay are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Hours per week left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hours per week is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Hourly wage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hourly wage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Hours per week to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Hours per week</strong> is measured in hours / week. The page reads it when it works out Weekly pay, Hourly wage and Daily pay. Have it to hand before you start: Hours per week is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hourly wage</strong> takes a plain number with no unit attached. The page reads it when it works out Hours per week, Weekly pay and Daily pay. Have it to hand before you start: Hourly wage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Daily pay</strong> is a plain number. The value follows from Hourly wage, Hours per week and Days per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Weekly pay</strong> is a plain number and the page's own defaults put it at 40000. The value follows from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly pay</strong> is a plain number. The value follows from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Annual pay</strong> is a plain number. The value follows from Hourly wage and Hours per week. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Days per week</strong> is a plain number. The value follows from Hourly wage, Hours per week and Daily pay. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weekly pay</th></tr></thead><tbody><tr><td><strong>Daily pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Monthly pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Annual pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Hours per week</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Days per week</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Hourly wage</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Hours per week sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Daily pay, Monthly pay and Annual pay barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Daily pay = 5 USD, Monthly pay = 50 USD, Annual pay = 500 USD, Hours per week = 20 hours / week, Days per week = 2.5 days / week and Hourly wage = 500 USD, the answer is <strong>Weekly pay</strong> = 10000 USD.</li><li>With Daily pay = 30 USD, Monthly pay = 100 USD, Annual pay = 1000 USD, Hours per week = 40 hours / week, Days per week = 5 days / week and Hourly wage = 1000 USD, the answer is <strong>Weekly pay</strong> = 40000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Daily pay follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Hours per week and Hourly wage is what you already know and Daily pay and Weekly pay is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/forward-premium">Forward premium</a>, <a href="/finance/forward-rate">Forward rate Calculator</a> and <a href="/finance/free-cash-flow">Free cash flow Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hours pay calculator work out?', 'a' => 'Daily pay, Weekly pay, Monthly pay and Annual pay, from Hourly wage and Hours per week. The relationship is Weekly pay = Hourly wage × Hours per week.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Hours per week (hours / week), Hourly wage (USD). Fill hours per week and hourly wage and leave Daily pay empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Weekly pay, Hours per week, Hourly wage and Daily pay can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Weekly pay = 40000 USD. The figures come from Hours per week as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Daily pay is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Hours per week left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Daily pay keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/forward-premium', 'name' => 'Forward premium'],
            ['path' => '/finance/forward-rate', 'name' => 'Forward rate Calculator'],
            ['path' => '/finance/free-cash-flow', 'name' => 'Free cash flow Calculator'],
        ],
        'authors' => [],
    ],
];
