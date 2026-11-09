<?php

/**
 * Goat gestation
 * /biology/goat-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Goat gestation',
    'meta' => ['title' => 'Goat gestation Calculator: Formula & Example', 'description' => 'Goat gestation works out kidding date from the breed of your goat is.... The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Goat gestation Calculator', 'updated' => '2025-04-07'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'miniature',
                            'label' => ' The breed of your goat is...',
                            'type' => 'select',
                            'options' => ['standard breed' => '1', 'miniature breed' => '0'],
                            'dataset' => 'miniature',
                            'default' => 'standard breed',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'exposed', 'label' => 'Breeding date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'calving', 'label' => 'Kidding date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'Your goat\'s due date is on a&nbsp;'],
                                ['when' => 'day == 0', 'text' => 'Sunday!'],
                                ['when' => 'day == 1', 'text' => 'Monday!'],
                                ['when' => 'day == 2', 'text' => 'Tuesday!'],
                                ['when' => 'day == 3', 'text' => 'Wednesday!'],
                                ['when' => 'day == 4', 'text' => 'Thursday!'],
                                ['when' => 'day == 5', 'text' => 'Friday!'],
                                ['when' => 'day == 6', 'text' => 'Saturday!'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'difference > 1', 'text' => 'Your goat is going to give birth in {{difference.formattedValue}} days!'],
                                ['when' => 'difference < 1', 'text' => 'Your goat is going to give birth in {{difference.formattedValue}} day!'],
                                ['when' => 'calving == currentDate', 'text' => 'Your goat gives birth today!!'],
                                ['when' => 'calving < currentDate', 'text' => 'Your goat gave birth {{negDifference.formattedValue}} day(s) ago!'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'day',
                            'label' => 'Day',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'daysUntil',
                            'label' => 'Days until',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'currentDate', 'label' => 'Current date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference',
                            'label' => 'Difference',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'negDifference',
                            'label' => 'Neg difference',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'calving = exposed + 150 - 5 * (1 - miniature)',
            'results' => ['miniature' => '(1/5)*calving - 1/5*exposed - 29', 'exposed' => 'calving - 5*miniature - 145', 'calving' => 'exposed + 5*miniature + 145'],
        ],
        [
            'title' => 'day = getDayOfWeek (calving)',
            'results' => ['day' => 'getDayOfWeek(calving)'],
        ],
        [
            'title' => 'daysUntil = calving - exposed',
            'results' => ['exposed' => 'calving - daysUntil', 'calving' => 'daysUntil + exposed', 'daysUntil' => 'calving - exposed'],
        ],
        [
            'title' => 'difference = calving - currentDate',
            'results' => ['calving' => 'currentDate + difference', 'currentDate' => 'calving - difference', 'difference' => 'calving - currentDate'],
        ],
        [
            'title' => 'negDifference = difference * -1',
            'results' => ['difference' => '-negDifference', 'negDifference' => '-difference'],
        ],
    ],
    'js' => '"use strict";omni.define("getDayOfWeek",function(dateInput){var date=new Date(dateInput*1000*60*60*24);return date.getUTCDay()});//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Goat gestation takes The breed of your goat is… and Breeding date and returns Kidding date and Day. Nothing is looked up on this page: kidding date is computed from the breed of your goat is… and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Goat gestation calculator works', 'html' => <<<'TXT'
            <p>Goat gestation answers one question from 2 numbers, and the answer is Kidding date, Day and Days until.</p><p>The relationship it solves reads Kidding date = Breeding date + 5 × The breed of your goat is... + 145.</p><p>The answers are Kidding date, Day, Days until and Current date; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>The breed of your goat is…</strong> — a plain number, no unit</li><li><strong>Breeding date</strong> — a plain number, no unit, entered as a date</li></ul><p>The answers come back as Kidding date, Day, Days until, Current date, Difference, Neg difference. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Breeding date = Sun 1 March 2026; the answers are <strong>The breed of your goat is…</strong> = 1, <strong>Kidding date</strong> = Wed 29 July 2026, <strong>Day</strong> = 3 and <strong>Days until</strong> = 150.</p><ul><li><strong>The breed of your goat is…</strong> = 1</li><li><strong>Kidding date</strong> = Wed 29 July 2026</li><li><strong>Day</strong> = 3</li><li><strong>Days until</strong> = 150</li></ul><p>The line behind those figures is <strong>Kidding date</strong> = <code>Breeding date + 5 × The breed of your goat is... + 145</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>The breed of your goat is...</strong> = 1, <strong>Kidding date</strong> = Wed 29 July 2026, <strong>Day</strong> = 3 and <strong>Days until</strong> = 150 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Kidding date takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Kidding date</strong> = <code>Breeding date + 5 × The breed of your goat is... + 145</code></li><li><strong>The breed of your goat is…</strong> = <code>(1 ÷ 5) × Kidding date − 1 ÷ 5 × Breeding date − 29</code></li><li><strong>Breeding date</strong> = <code>Kidding date − 5 × The breed of your goat is... − 145</code></li><li><strong>Day</strong> = <code>getDayOfWeek(Kidding date)</code></li><li><strong>Days until</strong> = <code>Kidding date − Breeding date</code></li><li><strong>Difference</strong> = <code>Kidding date − Current date</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Kidding date</strong> = <code>Breeding date + 5 × The breed of your goat is... + 145</code> — the form to use when Breeding date and The breed of your goat is… are the values you have.</li><li><strong>The breed of your goat is…</strong> = <code>(1 ÷ 5) × Kidding date − 1 ÷ 5 × Breeding date − 29</code> — the form to use when Kidding date and Breeding date are the values you have.</li><li><strong>Breeding date</strong> = <code>Kidding date − 5 × The breed of your goat is... − 145</code> — the form to use when Kidding date and The breed of your goat is… are the values you have.</li><li><strong>Day</strong> = <code>getDayOfWeek(Kidding date)</code> — the form to use when Kidding date are the values you have.</li><li><strong>Days until</strong> = <code>Kidding date − Breeding date</code> — the form to use when Kidding date and Breeding date are the values you have.</li><li><strong>Breeding date</strong> = <code>Kidding date − Days until</code> — the form to use when Kidding date and Days until are the values you have.</li><li><strong>Kidding date</strong> = <code>Days until + Breeding date</code> — the form to use when Days until and Breeding date are the values you have.</li><li><strong>Difference</strong> = <code>Kidding date − Current date</code> — the form to use when Kidding date and Current date are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Kidding date, The breed of your goat is… and Breeding date can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Breeding date, from Sun 1 March 2026 to Wed 29 April 2082 — and the answers go from <strong>The breed of your goat is...</strong> 1, <strong>Kidding date</strong> Wed 29 July 2026, <strong>Day</strong> 3 and <strong>Days until</strong> 150 to <strong>The breed of your goat is...</strong> 1, <strong>Kidding date</strong> Sat 26 September 2082, <strong>Day</strong> 6 and <strong>Days until</strong> 150.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Kidding date, Day and Days until are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>The breed of your goat is… left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If The breed of your goat is… is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Breeding date left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Breeding date is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in The breed of your goat is... and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Goat gestation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>The breed of your goat is…</strong> takes a plain number with no unit attached. Change it and Breeding date and Kidding date changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — The breed of your goat is… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Breeding date</strong> takes a plain number with no unit attached. Change it and The breed of your goat is…, Kidding date and Days until changes with it. Fill it from a measurement rather than a memory — Breeding date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Kidding date</strong> is a plain number and the page's own defaults put it at Wed 29 July 2026. It is worked out from Breeding date and The breed of your goat is…. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Day</strong> is a plain number and the page's own defaults put it at 3. It is worked out from Kidding date. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Days until</strong> is a plain number and the page's own defaults put it at 150. It is worked out from Kidding date and Breeding date. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Current date</strong> is a plain number. It is worked out from Kidding date and Difference. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Difference</strong> is a plain number. It is worked out from Kidding date and Current date. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Neg difference</strong> is a plain number. It is worked out from Difference. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>The breed of your goat is…</th><th>Kidding date</th><th>Day</th><th>Days until</th></tr></thead><tbody><tr><td><strong>Breeding date</strong> +10%</td><td>+0%</td><td>+9.93%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Breeding date sits at the top — a ten per cent error in that box shows up as roughly 9.9 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Breeding date = Fri 30 January 1998 and the page reports <strong>The breed of your goat is…</strong> = 1, <strong>Kidding date</strong> = Mon 29 June 1998, <strong>Day</strong> = 1 and <strong>Days until</strong> = 150.</li><li>Feed in Breeding date = Sat 28 June 2138 and the page reports <strong>The breed of your goat is…</strong> = 1, <strong>Kidding date</strong> = Tue 25 November 2138, <strong>Day</strong> = 2 and <strong>Days until</strong> = 150.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Kidding date follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes The breed of your goat is… and Breeding date are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when The breed of your goat is… and Breeding date is what you already know and Kidding date and Day is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Goat gestation calculator work out?', 'a' => <<<'TXT'
            Kidding date, Day, Days until and Current date, from Breeding date and The breed of your goat is…. The relationship is Kidding date = Breeding date + 5 × The breed of your goat is... + 145.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            The breed of your goat is…, Breeding date. Enter the breed of your goat is… and breeding date; Kidding date is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Kidding date, The breed of your goat is…, Breeding date and Day can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            The breed of your goat is… = 1, Kidding date = Wed 29 July 2026, Day = 3 and Days until = 150. That comes from the page's own defaults, entered in The breed of your goat is...; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Kidding date is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave The breed of your goat is... blank and the page solves for it, reporting Kidding date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Kidding date keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/gc-content-calculator', 'name' => 'GC Content Calculator'],
            ['path' => '/biology/gc-content-sequence', 'name' => 'GC Content from a Sequence — Sliding Window'],
            ['path' => '/biology/gdu', 'name' => 'GDU (growing degree units) Calculator'],
        ],
        'authors' => [],
    ],
];
