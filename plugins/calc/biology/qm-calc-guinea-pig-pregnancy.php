<?php

/**
 * Guinea pig pregnancy
 * /biology/guinea-pig-pregnancy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Guinea pig pregnancy',
    'meta' => ['title' => 'Guinea pig pregnancy Calculator: Units & Formula', 'description' => 'Guinea pig pregnancy works out due date from breeding date. Nothing is stored between visits: the boxes are the only place your numbers live. No sign-up.', 'h1' => 'Guinea pig pregnancy Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'breeding_date' => ['type' => 'date', 'rnd' => null],
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference_negated' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'due_date' => ['type' => 'date', 'rnd' => null],
            'earliest' => ['type' => 'date', 'rnd' => null],
            'latest' => ['type' => 'date', 'rnd' => null],
            'pregnancyDay' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'MUl5Gxw9ZziWT9v6NSZVQ',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'breeding_date', 'vt' => 'date', 'l' => 'Breeding date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'due_date', 'vt' => 'date', 'l' => 'Due date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        ['difference == 0', ' Your sow is going to farrow today!'],
                                        ['difference == 1', ' Your sow is going to farrow in about 1 day! Today is day {{pregnancyDay.formattedValue}} of the gestation.'],
                                        ['difference > 1', ' Your sow is going to farrow in about {{difference.formattedValue}} days! Today is day {{pregnancyDay.formattedValue}} of the gestation.'],
                                        ['difference == -1', ' Your sow gave birth 1 day ago!'],
                                        ['difference < -1', ' Your sow gave birth {{difference_negated.formattedValue}} days ago!'],
                                        [null, 'The earliest possible farrowing: {{earliest.shortValue}} The latest possible farrowing: {{latest.shortValue}}'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'oTJJJH94dhV3Lkew89BVI',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'pregnancyDay',
                                    'vt' => 'numerical',
                                    'l' => 'Pregnancy day',
                                    'us' => '19',
                                    'du' => 'days',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'currentDate', 'vt' => 'date', 'l' => 'Current date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'difference',
                                    'vt' => 'numerical',
                                    'l' => 'Difference',
                                    'us' => '19',
                                    'du' => 'days',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'difference_negated',
                                    'vt' => 'numerical',
                                    'l' => 'Difference negated',
                                    'us' => '19',
                                    'du' => 'days',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'earliest', 'vt' => 'date', 'l' => 'Earliest'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'latest',
                                    'vt' => 'date',
                                    'l' => 'Latest',
                                    'oo' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'due_date = breeding_date + 65',
                'var' => [
                    [
                        'l' => 'due_date',
                        'f' => 'breeding_date + 65',
                        'r' => ['breeding_date'],
                    ],
                    [
                        'l' => 'breeding_date',
                        'f' => 'due_date - 65',
                        'r' => ['due_date'],
                    ],
                ],
            ],
            [
                'formula' => 'difference = round(due_date - currentDate)',
                'var' => [
                    [
                        'l' => 'difference',
                        'f' => 'round(-currentDate + due_date)',
                        'r' => ['currentDate', 'due_date'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_negated = -1 * (due_date - currentDate)',
                'var' => [
                    [
                        'l' => 'currentDate',
                        'f' => 'difference_negated + due_date',
                        'r' => ['due_date', 'difference_negated'],
                    ],
                    [
                        'l' => 'due_date',
                        'f' => 'currentDate - difference_negated',
                        'r' => ['currentDate', 'difference_negated'],
                    ],
                    [
                        'l' => 'difference_negated',
                        'f' => 'currentDate - due_date',
                        'r' => ['currentDate', 'due_date'],
                    ],
                ],
            ],
            [
                'formula' => 'pregnancyDay = round(currentDate - breeding_date)',
                'var' => [
                    [
                        'l' => 'pregnancyDay',
                        'f' => 'round(-breeding_date + currentDate)',
                        'r' => ['breeding_date', 'currentDate'],
                    ],
                ],
            ],
            [
                'formula' => 'earliest = breeding_date + 59',
                'var' => [
                    [
                        'l' => 'breeding_date',
                        'f' => 'earliest - 59',
                        'r' => ['earliest'],
                    ],
                    [
                        'l' => 'earliest',
                        'f' => 'breeding_date + 59',
                        'r' => ['breeding_date'],
                    ],
                ],
            ],
            [
                'formula' => 'latest = breeding_date + 72',
                'var' => [
                    [
                        'l' => 'latest',
                        'f' => 'breeding_date + 72',
                        'r' => ['breeding_date'],
                    ],
                    [
                        'l' => 'breeding_date',
                        'f' => 'latest - 72',
                        'r' => ['latest'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Breeding date into Guinea pig pregnancy and the answer comes back as Due date and Pregnancy day. The arithmetic is the whole method: due date is worked out from breeding date by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Guinea pig pregnancy calculator works', 'html' => <<<'TXT'
            <p>Guinea pig pregnancy answers one question from 1 number, and the answer is Due date, Pregnancy day and Current date.</p><p>Written with the labels from the form, Due date = Breeding date + 65.</p><p>What comes back is Due date, Pregnancy day, Current date and Difference — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Breeding date</strong> — a plain number, no unit, entered as a date</li></ul><p>The answers come back as Due date, Pregnancy day, Current date, Difference, Difference negated, Earliest, Latest. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Breeding date = Sun 1 March 2026; the answers are <strong>Due date</strong> = Tue 5 May 2026, <strong>Earliest</strong> = Wed 29 April 2026 and <strong>Latest</strong> = Tue 12 May 2026.</p><ul><li><strong>Due date</strong> = Tue 5 May 2026</li><li><strong>Earliest</strong> = Wed 29 April 2026</li><li><strong>Latest</strong> = Tue 12 May 2026</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Due date</strong> = <code>Breeding date + 65</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Due date</strong> = Tue 5 May 2026, <strong>Earliest</strong> = Wed 29 April 2026 and <strong>Latest</strong> = Tue 12 May 2026. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Due date is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Due date</strong> = <code>Breeding date + 65</code></li><li><strong>Breeding date</strong> = <code>Due date − 65</code></li><li><strong>Difference</strong> = <code>round( − Current date + Due date)</code></li><li><strong>Difference negated</strong> = <code>Current date − Due date</code></li><li><strong>Current date</strong> = <code>Difference negated + Due date</code></li><li><strong>Pregnancy day</strong> = <code>round( − Breeding date + Current date)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Due date</strong> = <code>Breeding date + 65</code> — the form to use when Breeding date are the values you have.</li><li><strong>Breeding date</strong> = <code>Due date − 65</code> — the form to use when Due date are the values you have.</li><li><strong>Difference</strong> = <code>round( − Current date + Due date)</code> — the form to use when Current date and Due date are the values you have.</li><li><strong>Difference negated</strong> = <code>Current date − Due date</code> — the form to use when Current date and Due date are the values you have.</li><li><strong>Current date</strong> = <code>Difference negated + Due date</code> — the form to use when Due date and Difference negated are the values you have.</li><li><strong>Due date</strong> = <code>Current date − Difference negated</code> — the form to use when Current date and Difference negated are the values you have.</li><li><strong>Pregnancy day</strong> = <code>round( − Breeding date + Current date)</code> — the form to use when Breeding date and Current date are the values you have.</li><li><strong>Earliest</strong> = <code>Breeding date + 59</code> — the form to use when Breeding date are the values you have.</li></ul><p>Any one of Due date, Breeding date and Difference can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Breeding date, from Sun 1 March 2026 to Wed 29 April 2082 — and the answers go from <strong>Due date</strong> Tue 5 May 2026, <strong>Earliest</strong> Wed 29 April 2026 and <strong>Latest</strong> Tue 12 May 2026 to <strong>Due date</strong> Fri 3 July 2082, <strong>Earliest</strong> Sat 27 June 2082 and <strong>Latest</strong> Fri 10 July 2082.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Due date, Pregnancy day and Current date are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Breeding date left as a guess.</strong> Anything typed into Breeding date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Breeding date to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Guinea pig pregnancy form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Breeding date</strong> takes a plain number with no unit attached. The page reads it when it works out Due date, Pregnancy day and Earliest. Fill it from a measurement rather than a memory — Breeding date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Due date</strong> is a plain number and the page's own defaults put it at Tue 5 May 2026. The value follows from Breeding date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Pregnancy day</strong> is a plain number. The value follows from Breeding date and Current date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Current date</strong> is a plain number. The value follows from Due date and Difference negated. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Difference</strong> is a plain number. The value follows from Current date and Due date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Difference negated</strong> is a plain number. The value follows from Current date and Due date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Earliest</strong> is a plain number and the page's own defaults put it at Wed 29 April 2026. The value follows from Breeding date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Latest</strong> is a plain number and the page's own defaults put it at Tue 12 May 2026. The value follows from Breeding date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Due date</th><th>Earliest</th><th>Latest</th></tr></thead><tbody><tr><td><strong>Breeding date</strong> +10%</td><td>+9.97%</td><td>+9.97%</td><td>+9.97%</td></tr></tbody></table><p>The steepest column belongs to Breeding date: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Breeding date = Fri 30 January 1998 and the page reports <strong>Due date</strong> = Sun 5 April 1998, <strong>Earliest</strong> = Mon 30 March 1998 and <strong>Latest</strong> = Sun 12 April 1998.</li><li>Feed in Breeding date = Sat 28 June 2138 and the page reports <strong>Due date</strong> = Mon 1 September 2138, <strong>Earliest</strong> = Tue 26 August 2138 and <strong>Latest</strong> = Mon 8 September 2138.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Due date is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Breeding date measured, Due date and Pregnancy day wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/tree-height">Tree height</a>, <a href="/biology/tree-spacing">Tree spacing</a> and <a href="/biology/tree-value">Tree value Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Guinea pig pregnancy calculator work out?', 'a' => 'Due date, Pregnancy day, Current date and Difference, from Breeding date. The relationship is Due date = Breeding date + 65.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Breeding date. Enter breeding date; Due date is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Due date, Breeding date, Difference and Difference negated blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Due date = Tue 5 May 2026, Earliest = Wed 29 April 2026 and Latest = Tue 12 May 2026. The figures come from Breeding date as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Due date is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Breeding date blank and the page solves for it, reporting Due date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Due date keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/tree-height', 'name' => 'Tree height'],
            ['path' => '/biology/tree-spacing', 'name' => 'Tree spacing'],
            ['path' => '/biology/tree-value', 'name' => 'Tree value Calculator'],
        ],
        'authors' => [],
    ],
];
