<?php

/**
 * Average daily rate
 * /finance/adr
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Average daily rate',
    'meta' => ['title' => 'Average daily rate: Formula, Steps & Results', 'description' => 'Average daily rate works out estimated average daily rate from rooms revenue earned. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Average daily rate Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => 'Average daily rate (ADR)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rooms_revenue_earned',
                            'label' => 'Rooms revenue earned',
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
                            'name' => 'num_rooms_sold',
                            'label' => 'Number of rooms sold',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_daily_rate',
                            'label' => 'Average daily rate',
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
            'title' => 'Estimated ADR',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_monthly_revenue',
                            'label' => 'Average monthly revenue',
                            'type' => 'number',
                            'help' => 'Your total revenue over 30 days.',
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
                            'name' => 'num_rooms',
                            'label' => 'Number of rooms in the property',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'estimated_average_daily_rate',
                            'label' => 'Estimated average daily rate',
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
            'title' => 'average_daily_rate = rooms_revenue_earned / num_rooms_sold',
            'results' => ['num_rooms_sold' => 'rooms_revenue_earned/average_daily_rate', 'average_daily_rate' => 'rooms_revenue_earned/num_rooms_sold', 'rooms_revenue_earned' => 'average_daily_rate*num_rooms_sold'],
        ],
        [
            'title' => 'estimated_average_daily_rate = (average_monthly_revenue / 30) / num_rooms',
            'results' => ['estimated_average_daily_rate' => '(1/30)*average_monthly_revenue/num_rooms', 'num_rooms' => '(1/30)*average_monthly_revenue/estimated_average_daily_rate', 'average_monthly_revenue' => '30*estimated_average_daily_rate*num_rooms'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Average daily rate takes Rooms revenue earned and Number of rooms sold and returns Average daily rate and Average monthly revenue. There is no hidden constant here: change average daily rate and rooms revenue earned moves with it. The main result, Average daily rate, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Average daily rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Average daily rate: it takes 2 numbers and reports Average daily rate, Average monthly revenue and Number of rooms in the property.</p><p>Written with the labels from the form, Average daily rate = Rooms revenue earned ÷ Number of rooms sold.</p><p>The answers are Average daily rate, Average monthly revenue, Number of rooms in the property and Estimated average daily rate; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Rooms revenue earned</strong> — in USD</li><li><strong>Number of rooms sold</strong> — a plain number, no unit</li></ul><p>The answers come back as Average daily rate in USD, Average monthly revenue in USD, Number of rooms in the property, Estimated average daily rate in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Rooms revenue earned = 10 USD, Number of rooms sold = 100, Average monthly revenue = 1000 USD, Number of rooms in the property = 10 and Estimated average daily rate = 100 USD; the answers are <strong>Average daily rate</strong> = 0.1 USD.</p><ul><li><strong>Average daily rate</strong> = 0.1 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Average daily rate</strong> = <code>Rooms revenue earned ÷ Number of rooms sold</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Average daily rate</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Average daily rate takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Average daily rate</strong> = <code>Rooms revenue earned ÷ Number of rooms sold</code></li><li><strong>Number of rooms sold</strong> = <code>Rooms revenue earned ÷ Average daily rate</code></li><li><strong>Rooms revenue earned</strong> = <code>Average daily rate × Number of rooms sold</code></li><li><strong>Estimated average daily rate</strong> = <code>(1 ÷ 30) × Average monthly revenue ÷ Number of rooms in the property</code></li><li><strong>Number of rooms in the property</strong> = <code>(1 ÷ 30) × Average monthly revenue ÷ Estimated average daily rate</code></li><li><strong>Average monthly revenue</strong> = <code>30 × Estimated average daily rate × Number of rooms in the property</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Average daily rate</strong> = <code>Rooms revenue earned ÷ Number of rooms sold</code> — the form to use when Rooms revenue earned and Number of rooms sold are the values you have.</li><li><strong>Number of rooms sold</strong> = <code>Rooms revenue earned ÷ Average daily rate</code> — the form to use when Rooms revenue earned and Average daily rate are the values you have.</li><li><strong>Rooms revenue earned</strong> = <code>Average daily rate × Number of rooms sold</code> — the form to use when Average daily rate and Number of rooms sold are the values you have.</li><li><strong>Estimated average daily rate</strong> = <code>(1 ÷ 30) × Average monthly revenue ÷ Number of rooms in the property</code> — the form to use when Average monthly revenue and Number of rooms in the property are the values you have.</li><li><strong>Number of rooms in the property</strong> = <code>(1 ÷ 30) × Average monthly revenue ÷ Estimated average daily rate</code> — the form to use when Average monthly revenue and Estimated average daily rate are the values you have.</li><li><strong>Average monthly revenue</strong> = <code>30 × Estimated average daily rate × Number of rooms in the property</code> — the form to use when Estimated average daily rate and Number of rooms in the property are the values you have.</li></ul><p>Any one of Average daily rate, Number of rooms sold and Rooms revenue earned can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Rooms revenue earned from 10 to 20, leaving every other box alone. The panel moves from <strong>Average daily rate</strong> 0.1 USD to <strong>Average daily rate</strong> 0.2 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Average daily rate, Average monthly revenue and Number of rooms in the property are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Rooms revenue earned left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Rooms revenue earned is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of rooms sold left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of rooms sold is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Rooms revenue earned and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Average daily rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Rooms revenue earned</strong> takes a plain number with no unit attached. The page reads it when it works out Number of rooms sold and Average daily rate. Fill it from a measurement rather than a memory — Rooms revenue earned is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of rooms sold</strong> takes a plain number with no unit attached. The page reads it when it works out Average daily rate and Rooms revenue earned. Fill it from a measurement rather than a memory — Number of rooms sold is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Average daily rate</strong> is a plain number and the page's own defaults put it at 0.1. It is computed from Rooms revenue earned and Number of rooms sold, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Average monthly revenue</strong> is a plain number. It is computed from Estimated average daily rate and Number of rooms in the property, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Number of rooms in the property</strong> is a plain number. It is computed from Average monthly revenue and Estimated average daily rate, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Estimated average daily rate</strong> is a plain number. It is computed from Average monthly revenue and Number of rooms in the property, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Average daily rate</th></tr></thead><tbody><tr><td><strong>Rooms revenue earned</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of rooms sold</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Average monthly revenue</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of rooms in the property</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Estimated average daily rate</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Rooms revenue earned sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Average monthly revenue, Number of rooms in the property and Estimated average daily rate barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Rooms revenue earned = 5 USD, Number of rooms sold = 50, Average monthly revenue = 500 USD, Number of rooms in the property = 5 and Estimated average daily rate = 50 USD and the page reports <strong>Average daily rate</strong> = 0.1 USD.</li><li>Feed in Rooms revenue earned = 30 USD, Number of rooms sold = 100, Average monthly revenue = 1000 USD, Number of rooms in the property = 10 and Estimated average daily rate = 100 USD and the page reports <strong>Average daily rate</strong> = 0.3 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Average daily rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Rooms revenue earned and Number of rooms sold measured, Average daily rate and Average monthly revenue wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/mortgage-extra-payments">Mortgage calculator with extra payments Calculator</a>, <a href="/finance/mortgage">Mortgage Calculator</a> and <a href="/finance/mortgage-interest">Mortgage interest</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Average daily rate calculator work out?', 'a' => <<<'TXT'
            Average daily rate, Average monthly revenue, Number of rooms in the property and Estimated average daily rate, from Rooms revenue earned and Number of rooms sold. The relationship is Average daily rate = Rooms revenue earned ÷ Number of rooms sold.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Rooms revenue earned (USD), Number of rooms sold. With rooms revenue earned and number of rooms sold in place, Average daily rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Average daily rate, Number of rooms sold, Rooms revenue earned and Estimated average daily rate blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Average daily rate = 0.1 USD. That comes from the page\'s own defaults, entered in Rooms revenue earned; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Average daily rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Rooms revenue earned blank and the page solves for it, reporting Average daily rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Average daily rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/mortgage-extra-payments', 'name' => 'Mortgage calculator with extra payments Calculator'],
            ['path' => '/finance/mortgage', 'name' => 'Mortgage Calculator'],
            ['path' => '/finance/mortgage-interest', 'name' => 'Mortgage interest'],
        ],
        'authors' => [],
    ],
];
