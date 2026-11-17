<?php

/**
 * Overtime
 * /finance/overtime
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Overtime',
    'meta' => ['title' => 'Overtime Calculator — Formula, Units & Example', 'description' => 'Overtime works out total regular pay from regular pay and regular work time. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Overtime Calculator', 'updated' => '2026-10-01'],
    'sections' => [
        [
            'title' => 'Regular work time',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'regular_pay',
                            'label' => 'Regular pay',
                            'type' => 'number',
                            'help' => 'Switching time units assumes you work 5 days a week and there are approximately 4.3 weeks in the average month.',
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
                            'name' => 'regular_hours',
                            'label' => 'Regular work time',
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
                            'name' => 'total_regular_pay',
                            'label' => 'Total regular pay',
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
            'title' => 'Overtime',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'multiplier',
                            'label' => 'Overtime pay multiplier',
                            'type' => 'number',
                            'help' => 'The number by which your regular pay is multiplied if you work overtime.',
                            'rounding' => ['standard', '2'],
                            'default' => '1.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'overtime_pay',
                            'label' => 'Overtime pay',
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
                            'name' => 'overtime_hours',
                            'label' => 'Overtime hours',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_overtime_pay',
                            'label' => 'Total overtime pay',
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
            'title' => 'In total',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_pay',
                            'label' => 'Total pay',
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
            'title' => 'overtime_pay = regular_pay * multiplier',
            'results' => ['regular_pay' => 'overtime_pay/multiplier', 'overtime_pay' => 'multiplier*regular_pay', 'multiplier' => 'overtime_pay/regular_pay'],
        ],
        [
            'title' => 'overtime_hours * overtime_pay = total_overtime_pay',
            'results' => ['overtime_pay' => 'total_overtime_pay/overtime_hours', 'overtime_hours' => 'total_overtime_pay/overtime_pay', 'total_overtime_pay' => 'overtime_hours*overtime_pay'],
        ],
        [
            'title' => 'regular_hours * regular_pay = total_regular_pay',
            'results' => ['total_regular_pay' => 'regular_hours*regular_pay', 'regular_pay' => 'total_regular_pay/regular_hours', 'regular_hours' => 'total_regular_pay/regular_pay'],
        ],
        [
            'title' => 'total_regular_pay + total_overtime_pay = total_pay',
            'results' => ['total_regular_pay' => '-total_overtime_pay + total_pay', 'total_pay' => 'total_overtime_pay + total_regular_pay', 'total_overtime_pay' => 'total_pay - total_regular_pay'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Overtime takes Regular pay and Overtime pay multiplier and returns Regular work time and Total regular pay. It is a single relationship that reads regular work time out of regular pay, not a table of canned results keyed by them. Units for Regular work time default to hours and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Overtime calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Overtime: it takes 2 numbers and reports Regular work time, Total regular pay and Overtime pay.</p><p>The relationship it solves reads Overtime pay = Overtime pay multiplier × Regular pay.</p><p>The result panel carries Regular work time, Total regular pay, Overtime pay and Overtime hours, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Regular pay</strong> — in USD. Switching time units assumes you work 5 days a week and there are approximately 4.3 weeks in the average month.</li><li><strong>Overtime pay multiplier</strong> — a plain number, no unit. The number by which your regular pay is multiplied if you work overtime.</li></ul><p>What you get back is Regular work time in hours, Total regular pay in USD, Overtime pay in USD, Overtime hours in hours, Total overtime pay in USD, Total pay in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Regular pay = 10 USD, Regular work time = 40 hour, Total regular pay = 1000 USD, Overtime pay multiplier = 1.5, Overtime hours = 100 hour, Total overtime pay = 1000 USD and Total pay = 10 USD — through the same formula and the panel reports <strong>Overtime pay</strong> = 15 USD.</p><ul><li><strong>Overtime pay</strong> = 15 USD</li></ul><p>The line behind those figures is <strong>Overtime pay</strong> = <code>Overtime pay multiplier × Regular pay</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Overtime pay</strong> = 15 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Regular work time offers 4 units and opens on hours, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Overtime pay</strong> = <code>Overtime pay multiplier × Regular pay</code></li><li><strong>Regular pay</strong> = <code>Overtime pay ÷ Overtime pay multiplier</code></li><li><strong>Overtime pay multiplier</strong> = <code>Overtime pay ÷ Regular pay</code></li><li><strong>Overtime hours</strong> = <code>Total overtime pay ÷ Overtime pay</code></li><li><strong>Total overtime pay</strong> = <code>Overtime hours × Overtime pay</code></li><li><strong>Total regular pay</strong> = <code>Regular work time × Regular pay</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Overtime pay</strong> = <code>Overtime pay multiplier × Regular pay</code> — the form to use when Overtime pay multiplier and Regular pay are the values you have.</li><li><strong>Regular pay</strong> = <code>Overtime pay ÷ Overtime pay multiplier</code> — the form to use when Overtime pay and Overtime pay multiplier are the values you have.</li><li><strong>Overtime pay multiplier</strong> = <code>Overtime pay ÷ Regular pay</code> — the form to use when Overtime pay and Regular pay are the values you have.</li><li><strong>Overtime pay</strong> = <code>Total overtime pay ÷ Overtime hours</code> — the form to use when Total overtime pay and Overtime hours are the values you have.</li><li><strong>Overtime hours</strong> = <code>Total overtime pay ÷ Overtime pay</code> — the form to use when Total overtime pay and Overtime pay are the values you have.</li><li><strong>Total overtime pay</strong> = <code>Overtime hours × Overtime pay</code> — the form to use when Overtime hours and Overtime pay are the values you have.</li><li><strong>Total regular pay</strong> = <code>Regular work time × Regular pay</code> — the form to use when Regular work time and Regular pay are the values you have.</li><li><strong>Regular pay</strong> = <code>Total regular pay ÷ Regular work time</code> — the form to use when Total regular pay and Regular work time are the values you have.</li></ul><p>Any one of Overtime pay, Regular pay and Overtime pay multiplier can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Regular pay from 10 to 20, leaving every other box alone. The panel moves from <strong>Overtime pay</strong> 15 USD to <strong>Overtime pay</strong> 30 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Regular work time, Total regular pay and Overtime pay are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Regular pay left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Regular pay is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Overtime pay multiplier left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Overtime pay multiplier is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Regular pay and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Overtime form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Regular pay</strong> takes a plain number with no unit attached. Switching time units assumes you work 5 days a week and there are approximately 4.3 weeks in the average month. Change it and Overtime pay, Overtime pay multiplier and Total regular pay changes with it. Fill it from a measurement rather than a memory — Regular pay is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Overtime pay multiplier</strong> takes a plain number with no unit attached. The number by which your regular pay is multiplied if you work overtime. Change it and Regular pay and Overtime pay changes with it. Fill it from a measurement rather than a memory — Overtime pay multiplier is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Regular work time</strong> is a hours figure. It is worked out from Total regular pay and Regular pay. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total regular pay</strong> is a plain number. It is worked out from Regular work time and Regular pay. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Overtime pay</strong> is a plain number and the page's own defaults put it at 15. It is worked out from Overtime pay multiplier and Regular pay. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Overtime hours</strong> is a hours figure. It is worked out from Total overtime pay and Overtime pay. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total overtime pay</strong> is a plain number. It is worked out from Overtime hours and Overtime pay. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total pay</strong> is a plain number. It is worked out from Total overtime pay and Total regular pay. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Overtime pay</th></tr></thead><tbody><tr><td><strong>Regular pay</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Regular work time</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total regular pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Overtime pay multiplier</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Overtime hours</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total overtime pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total pay</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Regular pay sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Regular work time, Total regular pay and Overtime hours barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Regular pay = 5 USD, Regular work time = 20 hour, Total regular pay = 500 USD, Overtime pay multiplier = 0.75, Overtime hours = 50 hour, Total overtime pay = 500 USD and Total pay = 5 USD and the page reports <strong>Overtime pay</strong> = 3.75 USD.</li><li>Feed in Regular pay = 30 USD, Regular work time = 40 hour, Total regular pay = 1000 USD, Overtime pay multiplier = 1.5, Overtime hours = 100 hour, Total overtime pay = 1000 USD and Total pay = 10 USD and the page reports <strong>Overtime pay</strong> = 45 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Overtime actually offers.</p><ul><li><strong>hours</strong> — opens in <em>hour</em>, and the chip also carries weeks, days and months. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Regular work time follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are hours and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Regular pay and Overtime pay multiplier are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Regular pay and Overtime pay multiplier is what you already know and Regular work time and Total regular pay is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/ttm-trailing-twelve-months">TTM (trailing twelve months) Calculator</a>, <a href="/finance/turnover-rate">Turnover rate</a> and <a href="/finance/uk-coin-weight">UK coin weight Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Overtime calculator work out?', 'a' => <<<'TXT'
            Regular work time, Total regular pay, Overtime pay and Overtime hours, from Overtime pay multiplier and Regular pay. The relationship is Overtime pay = Overtime pay multiplier × Regular pay.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Regular pay (USD), Overtime pay multiplier. Enter regular pay and overtime pay multiplier; Regular work time is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Overtime pay, Regular pay, Overtime pay multiplier and Overtime hours blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Overtime pay = 15 USD. That comes from the page\'s own defaults, entered in Regular pay; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Regular work time is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Regular pay blank and the page solves for it, reporting Regular work time instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Regular work time keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/ttm-trailing-twelve-months', 'name' => 'TTM (trailing twelve months) Calculator'],
            ['path' => '/finance/turnover-rate', 'name' => 'Turnover rate'],
            ['path' => '/finance/uk-coin-weight', 'name' => 'UK coin weight Calculator'],
        ],
        'authors' => [],
    ],
];
