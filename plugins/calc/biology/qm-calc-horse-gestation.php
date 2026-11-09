<?php

/**
 * Horse gestation
 * /biology/horse-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Horse gestation',
    'meta' => ['title' => 'Horse gestation Calculator: Units & Formula', 'description' => 'Horse gestation turns mating date into foaling date. Each box lists the units it accepts, and the answer converts between them. Every figure is computed.', 'h1' => 'Horse gestation Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'matingDate', 'label' => 'Mating date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'date', 'label' => 'Foaling date', 'type' => 'date', 'help' => 'The estimated delivery date.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'difference == 0', 'text' => ' Your mare is going to foal today! Today is a&nbsp;'],
                                ['when' => 'difference == 1', 'text' => ' Your mare is going to foal in 1 day! Today is day 337 of the gestation. Your mare\'s estimated due date falls on a&nbsp;'],
                                ['when' => 'difference > 1', 'text' => <<<'TXT'
                                 Your mare is going to foal in {{difference.formattedValue}} days! Today is day {{pregnancyDay.formattedValue}} of the gestation. Your mare's estimated due date falls on a&nbsp;
                                TXT],
                                ['when' => 'difference == -1', 'text' => ' Your mare gave birth 1 day ago! Your mare\'s estimated due date was on a&nbsp;'],
                                ['when' => 'difference < -1', 'text' => ' Your mare gave birth {{difference_negated.formattedValue}} days ago! Your mare\'s estimated due date was on a&nbsp;'],
                                ['when' => 'weekday==0', 'text' => 'Sunday.'],
                                ['when' => 'weekday==1', 'text' => 'Monday.'],
                                ['when' => 'weekday==2', 'text' => 'Tuesday.'],
                                ['when' => 'weekday==3', 'text' => 'Wednesday.'],
                                ['when' => 'weekday==4', 'text' => 'Thursday.'],
                                ['when' => 'weekday==5', 'text' => 'Friday.'],
                                ['when' => 'weekday==6', 'text' => 'Saturday.'],
                                ['when' => null, 'text' => 'Earliest possible foaling: {{earliest.shortValue}} Latest possible foaling: {{latest.shortValue}}'],
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
                            'name' => 'pregnancyDay',
                            'label' => 'Pregnancy day',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
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
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference_negated',
                            'label' => 'Difference negated',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weekday',
                            'label' => 'Weekday',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'earliest', 'label' => 'Earliest', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'latest', 'label' => 'Latest', 'type' => 'date'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'date = matingDate + 338',
            'results' => ['matingDate' => 'date - 338', 'date' => 'matingDate + 338'],
        ],
        [
            'title' => 'difference = round(date - currentDate)',
            'results' => ['difference' => 'round(-currentDate + date)'],
        ],
        [
            'title' => 'difference_negated = -1 * (date - currentDate)',
            'results' => ['currentDate' => 'date + difference_negated', 'difference_negated' => 'currentDate - date', 'date' => 'currentDate - difference_negated'],
        ],
        [
            'title' => 'pregnancyDay = round(currentDate - matingDate)',
            'results' => ['pregnancyDay' => 'round(currentDate - matingDate)'],
        ],
        [
            'title' => 'earliest = matingDate + 331',
            'results' => ['matingDate' => 'earliest - 331', 'earliest' => 'matingDate + 331'],
        ],
        [
            'title' => 'latest = matingDate + 346',
            'results' => ['matingDate' => 'latest - 346', 'latest' => 'matingDate + 346'],
        ],
        [
            'title' => 'weekday = getDayOfWeek(date)',
            'results' => ['weekday' => 'getDayOfWeek(date)'],
        ],
    ],
    'js' => '"use strict";omni.define("getDayOfWeek",function(dateInput){var day=new Date(dateInput*86400000);return day.getUTCDay()});//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Mating date into Horse gestation and the answer comes back as Foaling date and Pregnancy day. There is no hidden constant here: change foaling date and mating date moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Horse gestation calculator works', 'html' => <<<'TXT'
            <p>The Horse gestation calculator applies one relationship to 1 number and reports Foaling date, Pregnancy day and Current date.</p><p>The relationship it solves reads Foaling date = Mating date + 338.</p><p>The result panel carries Foaling date, Pregnancy day, Current date and Difference, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Mating date</strong> — a plain number, no unit, entered as a date</li></ul><p>What you get back is Foaling date, Pregnancy day, Current date, Difference, Difference negated, Weekday, Earliest, Latest, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Mating date = Sun 1 March 2026 gives <strong>Foaling date</strong> = Tue 2 February 2027, <strong>Earliest</strong> = Tue 26 January 2027, <strong>Latest</strong> = Wed 10 February 2027 and <strong>Weekday</strong> = 2.</p><ul><li><strong>Foaling date</strong> = Tue 2 February 2027</li><li><strong>Earliest</strong> = Tue 26 January 2027</li><li><strong>Latest</strong> = Wed 10 February 2027</li><li><strong>Weekday</strong> = 2</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Foaling date</strong> = <code>Mating date + 338</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Foaling date</strong> = Tue 2 February 2027, <strong>Earliest</strong> = Tue 26 January 2027, <strong>Latest</strong> = Wed 10 February 2027 and <strong>Weekday</strong> = 2. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Foaling date is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Foaling date</strong> = <code>Mating date + 338</code></li><li><strong>Mating date</strong> = <code>Foaling date − 338</code></li><li><strong>Difference</strong> = <code>round( − Current date + Foaling date)</code></li><li><strong>Difference negated</strong> = <code>Current date − Foaling date</code></li><li><strong>Current date</strong> = <code>Foaling date + Difference negated</code></li><li><strong>Pregnancy day</strong> = <code>round(Current date − Mating date)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Foaling date</strong> = <code>Mating date + 338</code> — the form to use when Mating date are the values you have.</li><li><strong>Mating date</strong> = <code>Foaling date − 338</code> — the form to use when Foaling date are the values you have.</li><li><strong>Difference</strong> = <code>round( − Current date + Foaling date)</code> — the form to use when Current date and Foaling date are the values you have.</li><li><strong>Difference negated</strong> = <code>Current date − Foaling date</code> — the form to use when Current date and Foaling date are the values you have.</li><li><strong>Current date</strong> = <code>Foaling date + Difference negated</code> — the form to use when Foaling date and Difference negated are the values you have.</li><li><strong>Foaling date</strong> = <code>Current date − Difference negated</code> — the form to use when Current date and Difference negated are the values you have.</li><li><strong>Pregnancy day</strong> = <code>round(Current date − Mating date)</code> — the form to use when Current date and Mating date are the values you have.</li><li><strong>Earliest</strong> = <code>Mating date + 331</code> — the form to use when Mating date are the values you have.</li></ul><p>Any one of Foaling date, Mating date and Difference can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Mating date from Sun 1 March 2026 to Wed 29 April 2082, leaving every other box alone. The panel moves from <strong>Foaling date</strong> Tue 2 February 2027, <strong>Earliest</strong> Tue 26 January 2027, <strong>Latest</strong> Wed 10 February 2027 and <strong>Weekday</strong> 2 to <strong>Foaling date</strong> Fri 2 April 2083, <strong>Earliest</strong> Fri 26 March 2083, <strong>Latest</strong> Sat 10 April 2083 and <strong>Weekday</strong> 5.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Foaling date, Pregnancy day and Current date are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Mating date left as a guess.</strong> Anything typed into Mating date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Mating date to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Horse gestation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Mating date</strong> takes a plain number with no unit attached. Change it and Foaling date, Pregnancy day and Earliest changes with it. Fill it from a measurement rather than a memory — Mating date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Foaling date</strong> is a plain number and the page's own defaults put it at Tue 2 February 2027. It is worked out from Mating date. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Pregnancy day</strong> is a plain number. It is worked out from Current date and Mating date. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Current date</strong> is a plain number. It is worked out from Foaling date and Difference negated. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Difference</strong> is a plain number. It is worked out from Current date and Foaling date. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Difference negated</strong> is a plain number. It is worked out from Current date and Foaling date. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Weekday</strong> is a plain number and the page's own defaults put it at 2. It is worked out from Foaling date. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Earliest</strong> is a plain number and the page's own defaults put it at Tue 26 January 2027. It is worked out from Mating date. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Latest</strong> is a plain number and the page's own defaults put it at Wed 10 February 2027. It is worked out from Mating date. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Foaling date</th><th>Earliest</th><th>Latest</th><th>Weekday</th></tr></thead><tbody><tr><td><strong>Mating date</strong> +10%</td><td>+9.84%</td><td>+9.84%</td><td>+9.83%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Mating date: ten per cent there moves an answer by about 9.8 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Mating date = Fri 30 January 1998 and the page reports <strong>Foaling date</strong> = Sun 3 January 1999, <strong>Earliest</strong> = Sun 27 December 1998, <strong>Latest</strong> = Mon 11 January 1999 and <strong>Weekday</strong> = 0.</li><li>Feed in Mating date = Sat 28 June 2138 and the page reports <strong>Foaling date</strong> = Mon 1 June 2139, <strong>Earliest</strong> = Mon 25 May 2139, <strong>Latest</strong> = Tue 9 June 2139 and <strong>Weekday</strong> = 1.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Foaling date is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Mating date are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Mating date is what you already know and Foaling date and Pregnancy day is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Horse gestation calculator work out?', 'a' => 'Foaling date, Pregnancy day, Current date and Difference, from Mating date. The relationship is Foaling date = Mating date + 338.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mating date. Enter mating date; Foaling date is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Foaling date, Mating date, Difference and Difference negated blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Foaling date = Tue 2 February 2027, Earliest = Tue 26 January 2027, Latest = Wed 10 February 2027 and Weekday = 2. The figures come from Mating date as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Foaling date is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mating date blank and the page solves for it, reporting Foaling date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Foaling date at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/plasmid-molar-ratio', 'name' => 'Plasmid Molar Ratio Calculator'],
            ['path' => '/biology/potting-soil-calculator', 'name' => 'Potting soil Calculator'],
            ['path' => '/biology/primer-dimer-checker', 'name' => 'Primer Dimer Checker Calculator'],
        ],
        'authors' => [],
    ],
];
