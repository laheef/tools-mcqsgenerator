<?php

/**
 * Hourly to salary with overtime
 * /finance/hourly-to-salary-with-overtime
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hourly to salary with overtime',
    'meta' => ['title' => 'Hourly to salary with overtime — Formula & Results', 'description' => 'Hourly to salary with overtime works out total regular pay from regular pay. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Hourly to salary with overtime Calculator', 'updated' => '2024-07-05'],
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
                            'label' => 'Overtime work time',
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
            'title' => 'Salary with overtime',
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
        Hourly to salary with overtime works out Regular work time and Total regular pay from Regular pay and Overtime pay multiplier. Nothing is looked up on this page: regular work time is computed from regular pay and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Regular work time is opened in hours; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Hourly to salary with overtime calculator works', 'html' => <<<'TXT'
            <p>Hourly to salary with overtime answers one question from 2 numbers, and the answer is Regular work time, Total regular pay and Overtime pay.</p><p>Written with the labels from the form, Overtime pay = Overtime pay multiplier × Regular pay.</p><p>The answers are Regular work time, Total regular pay, Overtime pay and Overtime work time; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Regular pay</strong> — in USD. Switching time units assumes you work 5 days a week and there are approximately 4.3 weeks in the average month.</li><li><strong>Overtime pay multiplier</strong> — a plain number, no unit. The number by which your regular pay is multiplied if you work overtime.</li></ul><p>What you get back is Regular work time in hours, Total regular pay in USD, Overtime pay in USD, Overtime work time in hours, Total overtime pay in USD, Total pay in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Regular pay = 10 USD, Regular work time = 40 hour, Total regular pay = 1000 USD, Overtime pay multiplier = 1.5, Overtime work time = 100 hour, Total overtime pay = 1000 USD and Total pay = 10 USD gives <strong>Overtime pay</strong> = 15 USD.</p><ul><li><strong>Overtime pay</strong> = 15 USD</li></ul><p>The line behind those figures is <strong>Overtime pay</strong> = <code>Overtime pay multiplier × Regular pay</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Overtime pay</strong> = 15. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Regular work time lists 4 options and opens on hours. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Overtime pay</strong> = <code>Overtime pay multiplier × Regular pay</code></li><li><strong>Regular pay</strong> = <code>Overtime pay ÷ Overtime pay multiplier</code></li><li><strong>Overtime pay multiplier</strong> = <code>Overtime pay ÷ Regular pay</code></li><li><strong>Total overtime pay</strong> = <code>Overtime work time × Overtime pay</code></li><li><strong>Overtime work time</strong> = <code>Total overtime pay ÷ Overtime pay</code></li><li><strong>Total regular pay</strong> = <code>Regular work time × Regular pay</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Overtime pay</strong> = <code>Overtime pay multiplier × Regular pay</code> — the form to use when Overtime pay multiplier and Regular pay are the values you have.</li><li><strong>Regular pay</strong> = <code>Overtime pay ÷ Overtime pay multiplier</code> — the form to use when Overtime pay and Overtime pay multiplier are the values you have.</li><li><strong>Overtime pay multiplier</strong> = <code>Overtime pay ÷ Regular pay</code> — the form to use when Overtime pay and Regular pay are the values you have.</li><li><strong>Total overtime pay</strong> = <code>Overtime work time × Overtime pay</code> — the form to use when Overtime work time and Overtime pay are the values you have.</li><li><strong>Overtime pay</strong> = <code>Total overtime pay ÷ Overtime work time</code> — the form to use when Total overtime pay and Overtime work time are the values you have.</li><li><strong>Overtime work time</strong> = <code>Total overtime pay ÷ Overtime pay</code> — the form to use when Total overtime pay and Overtime pay are the values you have.</li><li><strong>Total regular pay</strong> = <code>Regular work time × Regular pay</code> — the form to use when Regular work time and Regular pay are the values you have.</li><li><strong>Regular work time</strong> = <code>Total regular pay ÷ Regular pay</code> — the form to use when Total regular pay and Regular pay are the values you have.</li></ul><p>Any one of Overtime pay, Regular pay and Overtime pay multiplier can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Regular pay, from 10 to 20 — and the answers go from <strong>Overtime pay</strong> 15 USD to <strong>Overtime pay</strong> 30 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Regular work time, Total regular pay and Overtime pay are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Regular pay left as a guess.</strong> Anything typed into Regular pay is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Overtime pay multiplier left as a guess.</strong> Anything typed into Overtime pay multiplier is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Regular pay and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Regular pay</strong> takes a plain number with no unit attached. Switching time units assumes you work 5 days a week and there are approximately 4.3 weeks in the average month. The page reads it when it works out Overtime pay multiplier, Overtime pay and Total regular pay. Have it to hand before you start: Regular pay is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Overtime pay multiplier</strong> takes a plain number with no unit attached. The number by which your regular pay is multiplied if you work overtime. The page reads it when it works out Regular pay and Overtime pay. Have it to hand before you start: Overtime pay multiplier is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Regular work time</strong> is a hours figure. The value follows from Total regular pay and Regular pay. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total regular pay</strong> is a plain number. The value follows from Regular work time and Regular pay. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Overtime pay</strong> is a plain number and the page's own defaults put it at 15. The value follows from Overtime pay multiplier and Regular pay. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Overtime work time</strong> is a hours figure. The value follows from Total overtime pay and Overtime pay. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total overtime pay</strong> is a plain number. The value follows from Overtime work time and Overtime pay. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total pay</strong> is a plain number. The value follows from Total overtime pay and Total regular pay. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Overtime pay</th></tr></thead><tbody><tr><td><strong>Regular pay</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Regular work time</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total regular pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Overtime pay multiplier</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Overtime work time</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total overtime pay</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total pay</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Regular pay: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Regular work time, Total regular pay and Overtime work time barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Regular pay = 5 USD, Regular work time = 20 hour, Total regular pay = 500 USD, Overtime pay multiplier = 0.75, Overtime work time = 50 hour, Total overtime pay = 500 USD and Total pay = 5 USD, the answer is <strong>Overtime pay</strong> = 3.75 USD.</li><li>With Regular pay = 30 USD, Regular work time = 40 hour, Total regular pay = 1000 USD, Overtime pay multiplier = 1.5, Overtime work time = 100 hour, Total overtime pay = 1000 USD and Total pay = 10 USD, the answer is <strong>Overtime pay</strong> = 45 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>hours</strong> — opens in <em>hour</em>, and the chip also carries weeks, days and months. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Regular work time is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are hours and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Regular pay and Overtime pay multiplier are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Regular pay and Overtime pay multiplier is what you already know and Regular work time and Total regular pay is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/nopat">NOPAT</a>, <a href="/finance/net-present-value">NPV</a> and <a href="/finance/nsfr">NSFR</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hourly to salary with overtime calculator work out?', 'a' => <<<'TXT'
            Regular work time, Total regular pay, Overtime pay and Overtime work time, from Overtime pay multiplier and Regular pay. The relationship is Overtime pay = Overtime pay multiplier × Regular pay.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Regular pay (USD), Overtime pay multiplier. With regular pay and overtime pay multiplier in place, Regular work time can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Overtime pay, Regular pay, Overtime pay multiplier and Total overtime pay blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Overtime pay = 15 USD. The figures come from Regular pay as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Regular work time is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Regular pay left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Regular work time keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/nopat', 'name' => 'NOPAT'],
            ['path' => '/finance/net-present-value', 'name' => 'NPV'],
            ['path' => '/finance/nsfr', 'name' => 'NSFR'],
        ],
        'authors' => [],
    ],
];
