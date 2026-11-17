<?php

/**
 * Pay raise
 * /finance/pay-raise
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pay raise',
    'meta' => ['title' => 'Pay raise Calculator — Formula, Units & Example', 'description' => 'Pay raise turns hours per week, hourly and percentage into weekly and monthly. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Pay raise Calculator', 'updated' => '2026-09-29'],
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
                            'label' => 'Hours per week',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'default' => '40',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Pay before raise',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'old_hourly',
                            'label' => 'Hourly',
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
                            'name' => 'old_weekly',
                            'label' => 'Weekly',
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
                            'name' => 'old_monthly',
                            'label' => 'Monthly',
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
                            'name' => 'old_annually',
                            'label' => 'Annual',
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
            'title' => 'Raise',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'increase_percent',
                            'label' => 'Percentage',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'increase_hourly',
                            'label' => 'Hourly',
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
                            'name' => 'increase_weekly',
                            'label' => 'Weekly',
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
                            'name' => 'increase_monthly',
                            'label' => 'Monthly',
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
                            'name' => 'increase_annually',
                            'label' => 'Annual',
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
            'title' => 'Pay after raise',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'new_hourly',
                            'label' => 'Hourly',
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
                            'name' => 'new_weekly',
                            'label' => 'Weekly',
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
                            'name' => 'new_monthly',
                            'label' => 'Monthly',
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
                            'name' => 'new_annually',
                            'label' => 'Annual',
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
            'title' => 'new_hourly = old_hourly + old_hourly * increase_percent',
            'results' => ['new_hourly' => 'old_hourly*(increase_percent + 1)', 'increase_percent' => '(new_hourly - old_hourly)/old_hourly', 'old_hourly' => 'new_hourly/(increase_percent + 1)'],
        ],
        [
            'title' => 'old_weekly = old_hourly * hours_per_week',
            'results' => ['hours_per_week' => 'old_weekly/old_hourly', 'old_weekly' => 'hours_per_week*old_hourly', 'old_hourly' => 'old_weekly/hours_per_week'],
        ],
        [
            'title' => 'old_monthly = old_hourly * hours_per_week * 52/12',
            'results' => ['old_monthly' => '(13/3)*hours_per_week*old_hourly', 'hours_per_week' => '(3/13)*old_monthly/old_hourly', 'old_hourly' => '(3/13)*old_monthly/hours_per_week'],
        ],
        [
            'title' => 'old_annually = old_hourly * hours_per_week * 52',
            'results' => ['old_annually' => '52*hours_per_week*old_hourly', 'hours_per_week' => '(1/52)*old_annually/old_hourly', 'old_hourly' => '(1/52)*old_annually/hours_per_week'],
        ],
        [
            'title' => 'new_weekly = new_hourly * hours_per_week',
            'results' => ['new_hourly' => 'new_weekly/hours_per_week', 'hours_per_week' => 'new_weekly/new_hourly', 'new_weekly' => 'hours_per_week*new_hourly'],
        ],
        [
            'title' => 'new_monthly = new_hourly * hours_per_week * 52/12',
            'results' => ['new_hourly' => '(3/13)*new_monthly/hours_per_week', 'hours_per_week' => '(3/13)*new_monthly/new_hourly', 'new_monthly' => '(13/3)*hours_per_week*new_hourly'],
        ],
        [
            'title' => 'new_annually = new_hourly * hours_per_week * 52',
            'results' => ['new_hourly' => '(1/52)*new_annually/hours_per_week', 'hours_per_week' => '(1/52)*new_annually/new_hourly', 'new_annually' => '52*hours_per_week*new_hourly'],
        ],
        [
            'title' => 'increase_hourly = new_hourly - old_hourly',
            'results' => ['new_hourly' => 'increase_hourly + old_hourly', 'increase_hourly' => 'new_hourly - old_hourly', 'old_hourly' => '-increase_hourly + new_hourly'],
        ],
        [
            'title' => 'increase_weekly = increase_hourly * hours_per_week',
            'results' => ['increase_weekly' => 'hours_per_week*increase_hourly', 'hours_per_week' => 'increase_weekly/increase_hourly', 'increase_hourly' => 'increase_weekly/hours_per_week'],
        ],
        [
            'title' => 'increase_monthly = increase_hourly * hours_per_week * 52/12',
            'results' => ['hours_per_week' => '(3/13)*increase_monthly/increase_hourly', 'increase_hourly' => '(3/13)*increase_monthly/hours_per_week', 'increase_monthly' => '(13/3)*hours_per_week*increase_hourly'],
        ],
        [
            'title' => 'increase_annually = increase_hourly * hours_per_week * 52',
            'results' => ['increase_annually' => '52*hours_per_week*increase_hourly', 'increase_hourly' => '(1/52)*increase_annually/hours_per_week', 'hours_per_week' => '(1/52)*increase_annually/increase_hourly'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Pay raise turns Percentage into Hours per week and Weekly. It is a single relationship that reads hours per week out of percentage, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Pay raise calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Pay raise: it takes 2 numbers and reports Hours per week, Weekly and Monthly.</p><p>The relationship it solves reads Hourly = Hourly × (Percentage + 1).</p><p>What comes back is Hours per week, Weekly, Monthly and Annual — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Hourly</strong> — in USD</li><li><strong>Percentage</strong> — in percent</li></ul><p>What you get back is Hours per week, Weekly in USD, Monthly in USD, Annual in USD, Hourly in USD, Weekly in USD, Monthly in USD, Annual in USD, Hourly in USD, Weekly in USD, Monthly in USD, Annual in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Hours per week = 40, Hourly = 100 USD, Weekly = 1000 USD, Monthly = 10 USD, Annual = 100 USD, Percentage = 1000 perc, Hourly = 10 USD, Weekly = 100 USD, Monthly = 1000 USD, Annual = 10 USD, Weekly = 100 USD, Monthly = 1000 USD and Annual = 10 USD — through the same formula and the panel reports <strong>Hourly</strong> = 100100 USD.</p><ul><li><strong>Hourly</strong> = 100100 USD</li></ul><p>The line behind those figures is <strong>Hourly</strong> = <code>Hourly × (Percentage + 1)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Hourly</strong> = 100100 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Percentage offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Hourly</strong> = <code>Hourly × (Percentage + 1)</code></li><li><strong>Percentage</strong> = <code>(Hourly − Hourly) ÷ Hourly</code></li><li><strong>Weekly</strong> = <code>Hours per week × Hourly</code></li><li><strong>Hours per week</strong> = <code>Weekly ÷ Hourly</code></li><li><strong>Monthly</strong> = <code>(13 ÷ 3) × Hours per week × Hourly</code></li><li><strong>Annual</strong> = <code>52 × Hours per week × Hourly</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Hourly</strong> = <code>Hourly × (Percentage + 1)</code> — the form to use when Hourly and Percentage are the values you have.</li><li><strong>Percentage</strong> = <code>(Hourly − Hourly) ÷ Hourly</code> — the form to use when Hourly and Hourly are the values you have.</li><li><strong>Hourly</strong> = <code>Hourly ÷ (Percentage + 1)</code> — the form to use when Hourly and Percentage are the values you have.</li><li><strong>Weekly</strong> = <code>Hours per week × Hourly</code> — the form to use when Hours per week and Hourly are the values you have.</li><li><strong>Hours per week</strong> = <code>Weekly ÷ Hourly</code> — the form to use when Weekly and Hourly are the values you have.</li><li><strong>Hourly</strong> = <code>Weekly ÷ Hours per week</code> — the form to use when Weekly and Hours per week are the values you have.</li><li><strong>Monthly</strong> = <code>(13 ÷ 3) × Hours per week × Hourly</code> — the form to use when Hours per week and Hourly are the values you have.</li><li><strong>Hours per week</strong> = <code>(3 ÷ 13) × Monthly ÷ Hourly</code> — the form to use when Monthly and Hourly are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Hourly, Percentage and Hourly can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Hours per week from 40 to 80, leaving every other box alone. The panel moves from <strong>Hourly</strong> 100100 USD to <strong>Hourly</strong> 100100 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Percentage is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Hours per week, Weekly and Monthly are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Hourly left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hourly is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Percentage left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Percentage is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Hourly is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Hourly</strong> takes a plain number with no unit attached. Change it and Hourly, Percentage and Hours per week changes with it. Have it to hand before you start: Hourly is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Percentage</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Hourly and Hourly changes with it. Have it to hand before you start: Percentage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Hours per week</strong> is a plain number. The value follows from Weekly and Hourly. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Weekly</strong> is a plain number. The value follows from Hours per week and Hourly. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly</strong> is a plain number. The value follows from Hours per week and Hourly. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Annual</strong> is a plain number. The value follows from Hours per week and Hourly. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Hourly</strong> is a plain number. The value follows from Hourly and Hourly. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Weekly</strong> is a plain number. The value follows from Hours per week and Hourly. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly</strong> is a plain number. The value follows from Hours per week and Hourly. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Annual</strong> is a plain number. The value follows from Hours per week and Hourly. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Hourly</strong> is a plain number and the page's own defaults put it at 100100. The value follows from Hourly and Percentage. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Weekly</strong> is a plain number. The value follows from Hours per week and Hourly. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly</strong> is a plain number. The value follows from Hours per week and Hourly. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Annual</strong> is a plain number. The value follows from Hours per week and Hourly. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Hours per week follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Hourly and Percentage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Hourly and Percentage is what you already know and Hours per week and Weekly is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/car-interest">Car interest Calculator</a>, <a href="/finance/car-lease">Car lease Calculator</a> and <a href="/finance/car-refinance">Car refinance Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pay raise calculator work out?', 'a' => 'Hours per week, Weekly, Monthly and Annual, from Hourly and Percentage. The relationship is Hourly = Hourly × (Percentage + 1).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Hourly (USD), Percentage (percent). Enter hourly and percentage; Hours per week is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Hourly, Percentage, Hourly and Weekly can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Hourly = 100100 USD. The figures come from Hourly as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Hours per week is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Hourly left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Hours per week keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/car-interest', 'name' => 'Car interest Calculator'],
            ['path' => '/finance/car-lease', 'name' => 'Car lease Calculator'],
            ['path' => '/finance/car-refinance', 'name' => 'Car refinance Calculator'],
        ],
        'authors' => [],
    ],
];
