<?php

/**
 * New York overtime
 * /finance/new-york-overtime
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'New York overtime',
    'meta' => ['title' => 'New York overtime: Formula, Steps & Results', 'description' => 'New York overtime takes regular pay, regular work time and overtime pay multiplier and returns total regular pay and overtime pay. A worked example follows.', 'h1' => 'New York overtime Calculator', 'updated' => '2024-02-13'],
    'sections' => [
        [
            'title' => 'Regular worktime',
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
        Enter Regular pay and Overtime pay multiplier into New York overtime and the answer comes back as Regular work time and Total regular pay. There is no hidden constant here: change regular work time and regular pay moves with it. The main result, Regular work time, is reported in hours.
        TXT,
        'sections' => [
            ['title' => 'How the New York overtime calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind New York overtime: it takes 2 numbers and reports Regular work time, Total regular pay and Overtime pay.</p><p>Written with the labels from the form, Overtime pay = Overtime pay multiplier × Regular pay.</p><p>The result panel carries Regular work time, Total regular pay, Overtime pay and Overtime hours, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Regular pay</strong> — in USD. Switching time units assumes you work 5 days a week and there are approximately 4.3 weeks in the average month.</li><li><strong>Overtime pay multiplier</strong> — a plain number, no unit. The number by which your regular pay is multiplied if you work overtime.</li></ul><p>What you get back is Regular work time in hours, Total regular pay in USD, Overtime pay in USD, Overtime hours in hours, Total overtime pay in USD, Total pay in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Regular pay = 10 USD, Regular work time = 40 hour, Total regular pay = 1000 USD, Overtime pay multiplier = 1.5, Overtime hours = 100 hour, Total overtime pay = 1000 USD and Total pay = 10 USD gives <strong>Overtime pay</strong> = 15 USD.</p><ul><li><strong>Overtime pay</strong> = 15 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Overtime pay</strong> = <code>Overtime pay multiplier × Regular pay</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Overtime pay</strong> = 15. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Regular work time lists 4 options and opens on hours. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Overtime pay</strong> = <code>Overtime pay multiplier × Regular pay</code></li><li><strong>Regular pay</strong> = <code>Overtime pay ÷ Overtime pay multiplier</code></li><li><strong>Overtime pay multiplier</strong> = <code>Overtime pay ÷ Regular pay</code></li><li><strong>Total overtime pay</strong> = <code>Overtime hours × Overtime pay</code></li><li><strong>Overtime hours</strong> = <code>Total overtime pay ÷ Overtime pay</code></li><li><strong>Total regular pay</strong> = <code>Regular work time × Regular pay</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Overtime pay</strong> = <code>Overtime pay multiplier × Regular pay</code> — the form to use when Overtime pay multiplier and Regular pay are the values you have.</li><li><strong>Regular pay</strong> = <code>Overtime pay ÷ Overtime pay multiplier</code> — the form to use when Overtime pay and Overtime pay multiplier are the values you have.</li><li><strong>Overtime pay multiplier</strong> = <code>Overtime pay ÷ Regular pay</code> — the form to use when Overtime pay and Regular pay are the values you have.</li><li><strong>Total overtime pay</strong> = <code>Overtime hours × Overtime pay</code> — the form to use when Overtime hours and Overtime pay are the values you have.</li><li><strong>Overtime pay</strong> = <code>Total overtime pay ÷ Overtime hours</code> — the form to use when Total overtime pay and Overtime hours are the values you have.</li><li><strong>Overtime hours</strong> = <code>Total overtime pay ÷ Overtime pay</code> — the form to use when Total overtime pay and Overtime pay are the values you have.</li><li><strong>Total regular pay</strong> = <code>Regular work time × Regular pay</code> — the form to use when Regular work time and Regular pay are the values you have.</li><li><strong>Regular work time</strong> = <code>Total regular pay ÷ Regular pay</code> — the form to use when Total regular pay and Regular pay are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Overtime pay, Regular pay and Overtime pay multiplier can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Regular pay from 10 to 20, leaving every other box alone. The panel moves from <strong>Overtime pay</strong> 15 USD to <strong>Overtime pay</strong> 30 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Regular work time, Total regular pay and Overtime pay are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Regular pay left as a guess.</strong> Anything typed into Regular pay is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Overtime pay multiplier left as a guess.</strong> Anything typed into Overtime pay multiplier is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Regular pay and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the New York overtime form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Regular pay</strong> takes a plain number with no unit attached. Switching time units assumes you work 5 days a week and there are approximately 4.3 weeks in the average month. It feeds Overtime pay multiplier, Overtime pay and Total regular pay. Fill it from a measurement rather than a memory — Regular pay is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Overtime pay multiplier</strong> takes a plain number with no unit attached. The number by which your regular pay is multiplied if you work overtime. It feeds Regular pay and Overtime pay. Fill it from a measurement rather than a memory — Overtime pay multiplier is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Regular work time</strong> is a hours figure. The value follows from Total regular pay and Regular pay. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total regular pay</strong> is a plain number. The value follows from Regular work time and Regular pay. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Overtime pay</strong> is a plain number and the page's own defaults put it at 15. The value follows from Overtime pay multiplier and Regular pay. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Overtime hours</strong> is a hours figure. The value follows from Total overtime pay and Overtime pay. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total overtime pay</strong> is a plain number. The value follows from Overtime hours and Overtime pay. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total pay</strong> is a plain number. The value follows from Total overtime pay and Total regular pay. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Overtime pay</th></tr></thead><tbody><tr><td><strong>Regular pay</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Regular work time</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total regular pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Overtime pay multiplier</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Overtime hours</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total overtime pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total pay</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Regular pay: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Regular work time, Total regular pay and Overtime hours barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Regular pay = 5 USD, Regular work time = 20 hour, Total regular pay = 500 USD, Overtime pay multiplier = 0.75, Overtime hours = 50 hour, Total overtime pay = 500 USD and Total pay = 5 USD and the page reports <strong>Overtime pay</strong> = 3.75 USD.</li><li>Feed in Regular pay = 30 USD, Regular work time = 40 hour, Total regular pay = 1000 USD, Overtime pay multiplier = 1.5, Overtime hours = 100 hour, Total overtime pay = 1000 USD and Total pay = 10 USD and the page reports <strong>Overtime pay</strong> = 45 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on New York overtime actually offers.</p><ul><li><strong>hours</strong> — opens in <em>hour</em>, and the chip also carries weeks, days and months. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Regular work time is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are hours and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Regular pay and Overtime pay multiplier are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Regular pay and Overtime pay multiplier measured, Regular work time and Total regular pay wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/ebitda-margin">EBITDA margin Calculator</a>, <a href="/finance/ebitda-multiple">EBITDA multiple</a> and <a href="/finance/economic-injury-disaster-loan">Economic Injury Disaster Loan Emergency Advance … Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the New York overtime calculator work out?', 'a' => <<<'TXT'
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
            The arithmetic runs at full precision and only the display of Regular work time is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Regular pay blank and the page solves for it, reporting Regular work time instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Regular work time at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/ebitda-margin', 'name' => 'EBITDA margin Calculator'],
            ['path' => '/finance/ebitda-multiple', 'name' => 'EBITDA multiple'],
            ['path' => '/finance/economic-injury-disaster-loan', 'name' => 'Economic Injury Disaster Loan Emergency Advance … Calculator'],
        ],
        'authors' => [],
    ],
];
