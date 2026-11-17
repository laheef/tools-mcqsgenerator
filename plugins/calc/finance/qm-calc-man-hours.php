<?php

/**
 * Man-hours
 * /finance/man-hours
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Man-hours',
    'meta' => ['title' => 'Man-hours Calculator — Formula, Units & Example', 'description' => 'Man-hours works out cost per person and total cost from people and hours per person. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Man-hours Calculator', 'updated' => '2026-09-22'],
    'sections' => [
        [
            'title' => 'Man-hours calculator',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people',
                            'label' => 'People',
                            'type' => 'number',
                            'help' => 'How many people are working?',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time',
                            'label' => 'Hours per person',
                            'type' => 'number',
                            'help' => 'How many hours did each person work for?',
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
                            'name' => 'man_hours',
                            'label' => 'Man-hours',
                            'type' => 'number',
                            'help' => 'Total time spent by everyone working&nbsp;',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Total cost of man-hours',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salary',
                            'label' => 'Hourly pay',
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
                            'name' => 'cost',
                            'label' => 'Cost per person',
                            'type' => 'number',
                            'help' => 'How much did each person earn?',
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
                            'name' => 'total_cost',
                            'label' => 'Total cost',
                            'type' => 'number',
                            'help' => 'Total cost of everyone\'s work',
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
            'title' => 'man_hours = people * time',
            'results' => ['time' => 'man_hours/people', 'man_hours' => 'people*time', 'people' => 'man_hours/time'],
        ],
        [
            'title' => 'cost = salary * time',
            'results' => ['time' => 'cost/salary', 'cost' => 'salary*time', 'salary' => 'cost/time'],
        ],
        [
            'title' => 'total_cost = salary * man_hours',
            'results' => ['man_hours' => 'total_cost/salary', 'salary' => 'total_cost/man_hours', 'total_cost' => 'man_hours*salary'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Man-hours takes People and Hours per person and returns Man-hours and Hourly pay. Nothing is looked up on this page: man-hours is computed from people and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Man-hours is opened in hours; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Man-hours calculator works', 'html' => <<<'TXT'
            <p>Man-hours answers one question from 2 numbers, and the answer is Man-hours, Hourly pay and Cost per person.</p><p>In the form&#039;s own words, Man-hours = People × Hours per person.</p><p>The answers are Man-hours, Hourly pay, Cost per person and Total cost; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>People</strong> — a plain number, no unit. How many people are working?</li><li><strong>Hours per person</strong> — in hours. How many hours did each person work for?</li></ul><p>The result boxes are Man-hours in hours, Hourly pay in USD, Cost per person in USD, Total cost in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, People = 10, Hours per person = 100 hrs, Hourly pay = 1000 USD, Cost per person = 10 USD and Total cost = 100 USD gives <strong>Man-hours</strong> = 1000 hrs.</p><ul><li><strong>Man-hours</strong> = 1000 hrs</li></ul><p>The line behind those figures is <strong>Man-hours</strong> = <code>People × Hours per person</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Man-hours</strong> = 1000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Man-hours offers 8 units and opens on hours, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Man-hours</strong> = <code>People × Hours per person</code></li><li><strong>Hours per person</strong> = <code>Man-hours ÷ People</code></li><li><strong>People</strong> = <code>Man-hours ÷ Hours per person</code></li><li><strong>Cost per person</strong> = <code>Hourly pay × Hours per person</code></li><li><strong>Hourly pay</strong> = <code>Cost per person ÷ Hours per person</code></li><li><strong>Total cost</strong> = <code>Man-hours × Hourly pay</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Man-hours</strong> = <code>People × Hours per person</code> — the form to use when People and Hours per person are the values you have.</li><li><strong>Hours per person</strong> = <code>Man-hours ÷ People</code> — the form to use when Man-hours and People are the values you have.</li><li><strong>People</strong> = <code>Man-hours ÷ Hours per person</code> — the form to use when Man-hours and Hours per person are the values you have.</li><li><strong>Cost per person</strong> = <code>Hourly pay × Hours per person</code> — the form to use when Hourly pay and Hours per person are the values you have.</li><li><strong>Hours per person</strong> = <code>Cost per person ÷ Hourly pay</code> — the form to use when Cost per person and Hourly pay are the values you have.</li><li><strong>Hourly pay</strong> = <code>Cost per person ÷ Hours per person</code> — the form to use when Cost per person and Hours per person are the values you have.</li><li><strong>Total cost</strong> = <code>Man-hours × Hourly pay</code> — the form to use when Man-hours and Hourly pay are the values you have.</li><li><strong>Man-hours</strong> = <code>Total cost ÷ Hourly pay</code> — the form to use when Total cost and Hourly pay are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Man-hours, Hours per person and People can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — People, from 10 to 20 — and the answers go from <strong>Man-hours</strong> 1000 hrs to <strong>Man-hours</strong> 2000 hrs.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Hours per person is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Man-hours, Hourly pay and Cost per person are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>People left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If People is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Hours per person left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hours per person is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in People and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>People</strong> takes a plain number with no unit attached. How many people are working?. Change it and Hours per person and Man-hours changes with it. Have it to hand before you start: People is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hours per person</strong> is a hours quantity: the page opens it in hrs and converts anything else you pick before the formula runs. How many hours did each person work for?. Change it and Man-hours, People and Cost per person changes with it. Have it to hand before you start: Hours per person is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Man-hours</strong> is a hours figure and the page's own defaults put it at 1000 hrs. It is worked out from People and Hours per person. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Hourly pay</strong> is a plain number. It is worked out from Cost per person and Hours per person. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cost per person</strong> is a plain number. It is worked out from Hourly pay and Hours per person. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total cost</strong> is a plain number. It is worked out from Man-hours and Hourly pay. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Man-hours</th></tr></thead><tbody><tr><td><strong>People</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Hours per person</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Hourly pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Cost per person</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total cost</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Hours per person sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Hourly pay, Cost per person and Total cost barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With People = 5, Hours per person = 50 hrs, Hourly pay = 500 USD, Cost per person = 5 USD and Total cost = 50 USD, the answer is <strong>Man-hours</strong> = 250 hrs.</li><li>With People = 30, Hours per person = 100 hrs, Hourly pay = 1000 USD, Cost per person = 10 USD and Total cost = 100 USD, the answer is <strong>Man-hours</strong> = 3000 hrs.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>hours</strong> — opens in <em>hrs</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Man-hours follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover hours. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are People and Hours per person and the number you are missing is Man-hours and Hourly pay.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/retention-ratio">Retention ratio Calculator</a>, <a href="/finance/retirement">Retirement Calculator</a> and <a href="/finance/retirement-withdrawal">Retirement withdrawal Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Man-hours calculator work out?', 'a' => 'Man-hours, Hourly pay, Cost per person and Total cost, from People and Hours per person. The relationship is Man-hours = People × Hours per person.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'People, Hours per person (hours). Fill people and hours per person and leave Man-hours empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Man-hours, Hours per person, People and Cost per person can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Man-hours = 1000 hrs. The figures come from People as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Man-hours is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With People left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Man-hours at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/retention-ratio', 'name' => 'Retention ratio Calculator'],
            ['path' => '/finance/retirement', 'name' => 'Retirement Calculator'],
            ['path' => '/finance/retirement-withdrawal', 'name' => 'Retirement withdrawal Calculator'],
        ],
        'authors' => [],
    ],
];
