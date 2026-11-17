<?php

/**
 * Illinois overtime
 * /finance/illinois-overtime
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Illinois overtime',
    'meta' => ['title' => 'Illinois overtime: Formula, Steps & Results', 'description' => 'Illinois overtime works out total regular pay and overtime pay and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Illinois overtime Calculator', 'updated' => '2024-02-13'],
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
            'results' => ['regular_pay' => 'overtime_pay/multiplier', 'multiplier' => 'overtime_pay/regular_pay', 'overtime_pay' => 'multiplier*regular_pay'],
        ],
        [
            'title' => 'overtime_hours * overtime_pay = total_overtime_pay',
            'results' => ['total_overtime_pay' => 'overtime_hours*overtime_pay', 'overtime_pay' => 'total_overtime_pay/overtime_hours', 'overtime_hours' => 'total_overtime_pay/overtime_pay'],
        ],
        [
            'title' => 'regular_hours * regular_pay = total_regular_pay',
            'results' => ['total_regular_pay' => 'regular_hours*regular_pay', 'regular_hours' => 'total_regular_pay/regular_pay', 'regular_pay' => 'total_regular_pay/regular_hours'],
        ],
        [
            'title' => 'total_regular_pay + total_overtime_pay = total_pay',
            'results' => ['total_regular_pay' => '-total_overtime_pay + total_pay', 'total_overtime_pay' => 'total_pay - total_regular_pay', 'total_pay' => 'total_overtime_pay + total_regular_pay'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Illinois overtime takes Regular pay and Overtime pay multiplier and returns Regular work time and Total regular pay. The arithmetic is the whole method: regular work time is worked out from regular pay by one formula, applied once. Regular work time comes back in hours unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Illinois overtime calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Illinois overtime: it takes 2 numbers and reports Regular work time, Total regular pay and Overtime pay.</p><p>In the form&#039;s own words, Overtime pay = Overtime pay multiplier × Regular pay.</p><p>What comes back is Regular work time, Total regular pay, Overtime pay and Overtime hours — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Regular pay</strong> — in USD. Switching time units assumes you work 5 days a week and there are approximately 4.3 weeks in the average month.</li><li><strong>Overtime pay multiplier</strong> — a plain number, no unit. The number by which your regular pay is multiplied if you work overtime.</li></ul><p>The result boxes are Regular work time in hours, Total regular pay in USD, Overtime pay in USD, Overtime hours in hours, Total overtime pay in USD, Total pay in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Regular pay = 10 USD, Regular work time = 40 hour, Total regular pay = 1000 USD, Overtime pay multiplier = 1.5, Overtime hours = 100 hour, Total overtime pay = 1000 USD and Total pay = 10 USD — through the same formula and the panel reports <strong>Overtime pay</strong> = 15 USD.</p><ul><li><strong>Overtime pay</strong> = 15 USD</li></ul><p>That is <strong>Overtime pay</strong> = <code>Overtime pay multiplier × Regular pay</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Overtime pay</strong> = 15 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Regular work time offers 4 units and opens on hours, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Overtime pay</strong> = <code>Overtime pay multiplier × Regular pay</code></li><li><strong>Regular pay</strong> = <code>Overtime pay ÷ Overtime pay multiplier</code></li><li><strong>Overtime pay multiplier</strong> = <code>Overtime pay ÷ Regular pay</code></li><li><strong>Total overtime pay</strong> = <code>Overtime hours × Overtime pay</code></li><li><strong>Overtime hours</strong> = <code>Total overtime pay ÷ Overtime pay</code></li><li><strong>Total regular pay</strong> = <code>Regular work time × Regular pay</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Overtime pay</strong> = <code>Overtime pay multiplier × Regular pay</code> — the form to use when Overtime pay multiplier and Regular pay are the values you have.</li><li><strong>Regular pay</strong> = <code>Overtime pay ÷ Overtime pay multiplier</code> — the form to use when Overtime pay and Overtime pay multiplier are the values you have.</li><li><strong>Overtime pay multiplier</strong> = <code>Overtime pay ÷ Regular pay</code> — the form to use when Overtime pay and Regular pay are the values you have.</li><li><strong>Total overtime pay</strong> = <code>Overtime hours × Overtime pay</code> — the form to use when Overtime hours and Overtime pay are the values you have.</li><li><strong>Overtime pay</strong> = <code>Total overtime pay ÷ Overtime hours</code> — the form to use when Total overtime pay and Overtime hours are the values you have.</li><li><strong>Overtime hours</strong> = <code>Total overtime pay ÷ Overtime pay</code> — the form to use when Total overtime pay and Overtime pay are the values you have.</li><li><strong>Total regular pay</strong> = <code>Regular work time × Regular pay</code> — the form to use when Regular work time and Regular pay are the values you have.</li><li><strong>Regular work time</strong> = <code>Total regular pay ÷ Regular pay</code> — the form to use when Total regular pay and Regular pay are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Overtime pay, Regular pay and Overtime pay multiplier can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Regular pay, from 10 to 20 — and the answers go from <strong>Overtime pay</strong> 15 USD to <strong>Overtime pay</strong> 30 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Regular work time, Total regular pay and Overtime pay are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Regular pay left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Regular pay is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Overtime pay multiplier left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Overtime pay multiplier is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Regular pay and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Regular pay</strong> takes a plain number with no unit attached. Switching time units assumes you work 5 days a week and there are approximately 4.3 weeks in the average month. The page reads it when it works out Overtime pay multiplier, Overtime pay and Total regular pay. Have it to hand before you start: Regular pay is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Overtime pay multiplier</strong> takes a plain number with no unit attached. The number by which your regular pay is multiplied if you work overtime. The page reads it when it works out Regular pay and Overtime pay. Have it to hand before you start: Overtime pay multiplier is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Regular work time</strong> is a hours figure. The value follows from Total regular pay and Regular pay. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total regular pay</strong> is a plain number. The value follows from Regular work time and Regular pay. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Overtime pay</strong> is a plain number and the page's own defaults put it at 15. The value follows from Overtime pay multiplier and Regular pay. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Overtime hours</strong> is a hours figure. The value follows from Total overtime pay and Overtime pay. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total overtime pay</strong> is a plain number. The value follows from Overtime hours and Overtime pay. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total pay</strong> is a plain number. The value follows from Total overtime pay and Total regular pay. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Overtime pay</th></tr></thead><tbody><tr><td><strong>Regular pay</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Regular work time</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total regular pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Overtime pay multiplier</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Overtime hours</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total overtime pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total pay</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Regular pay sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Regular work time, Total regular pay and Overtime hours barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>hours</strong> — opens in <em>hour</em>, and the chip also carries weeks, days and months. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Regular work time follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are hours and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Regular pay and Overtime pay multiplier are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Regular pay and Overtime pay multiplier is what you already know and Regular work time and Total regular pay is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/annuity-future-value">Future value of annuity</a>, <a href="/finance/future-value">Future value</a> and <a href="/finance/futures-contract">Futures contract Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Illinois overtime calculator work out?', 'a' => <<<'TXT'
            Regular work time, Total regular pay, Overtime pay and Overtime hours, from Overtime pay multiplier and Regular pay. The relationship is Overtime pay = Overtime pay multiplier × Regular pay.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Regular pay (USD), Overtime pay multiplier. With regular pay and overtime pay multiplier in place, Regular work time can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Overtime pay, Regular pay, Overtime pay multiplier and Total overtime pay can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Overtime pay = 15 USD. Those are the defaults written into the form — move Regular pay and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Regular work time is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Regular pay left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Regular work time keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/annuity-future-value', 'name' => 'Future value of annuity'],
            ['path' => '/finance/future-value', 'name' => 'Future value'],
            ['path' => '/finance/futures-contract', 'name' => 'Futures contract Calculator'],
        ],
        'authors' => [],
    ],
];
