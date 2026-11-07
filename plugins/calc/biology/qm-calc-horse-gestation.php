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
    'meta' => ['title' => 'Horse gestation Calculator: Free, With Steps', 'description' => 'Enter Foaling date into Horse gestation and the answer comes back as Mating date. There is no hidden constant here: change Mating date and Foaling date moves…', 'h1' => 'Horse gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'date' => ['type' => 'date', 'rnd' => null],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference_negated' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'earliest' => ['type' => 'date', 'rnd' => null],
            'latest' => ['type' => 'date', 'rnd' => null],
            'matingDate' => ['type' => 'date', 'rnd' => null],
            'pregnancyDay' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weekday' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'guLepVD0nr0uoFvQ3EJ8T',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'matingDate', 'vt' => 'date', 'l' => 'Mating date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'date',
                                    'vt' => 'date',
                                    'l' => 'Foaling date',
                                    'h' => 'The estimated delivery date.',
                                ],
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
                                        ['difference == 0', '🐎 Your mare is going to foal today! Today is a&nbsp;'],
                                        ['difference == 1', '🐎 Your mare is going to foal in 1 day! Today is day 337 of the gestation. Your mare\'s estimated due date falls on a&nbsp;'],
                                        ['difference > 1', <<<'TXT'
                                        🐎 Your mare is going to foal in {{difference.formattedValue}} days! Today is day {{pregnancyDay.formattedValue}} of the gestation. Your mare's estimated due date falls on a&nbsp;
                                        TXT],
                                        ['difference == -1', '🐎 Your mare gave birth 1 day ago! Your mare\'s estimated due date was on a&nbsp;'],
                                        ['difference < -1', '🐎 Your mare gave birth {{difference_negated.formattedValue}} days ago! Your mare\'s estimated due date was on a&nbsp;'],
                                        ['weekday==0', 'Sunday.'],
                                        ['weekday==1', 'Monday.'],
                                        ['weekday==2', 'Tuesday.'],
                                        ['weekday==3', 'Wednesday.'],
                                        ['weekday==4', 'Thursday.'],
                                        ['weekday==5', 'Friday.'],
                                        ['weekday==6', 'Saturday.'],
                                        [null, 'Earliest possible foaling: {{earliest.shortValue}} Latest possible foaling: {{latest.shortValue}}'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '3zPpw3ppfeRVdGYAiHkF0',
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
                                ['t' => 'v', 'n' => 'weekday', 'vt' => 'numerical', 'l' => 'Weekday'],
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
                                ['t' => 'v', 'n' => 'latest', 'vt' => 'date', 'l' => 'Latest'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'date = matingDate + 338',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'date - 338',
                        'r' => ['date'],
                    ],
                    [
                        'l' => 'date',
                        'f' => 'matingDate + 338',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference = round(date - currentDate)',
                'var' => [
                    [
                        'l' => 'difference',
                        'f' => 'round(-currentDate + date)',
                        'r' => ['currentDate', 'date'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_negated = -1 * (date - currentDate)',
                'var' => [
                    [
                        'l' => 'currentDate',
                        'f' => 'date + difference_negated',
                        'r' => ['difference_negated', 'date'],
                    ],
                    [
                        'l' => 'difference_negated',
                        'f' => 'currentDate - date',
                        'r' => ['currentDate', 'date'],
                    ],
                    [
                        'l' => 'date',
                        'f' => 'currentDate - difference_negated',
                        'r' => ['currentDate', 'difference_negated'],
                    ],
                ],
            ],
            [
                'formula' => 'pregnancyDay = round(currentDate - matingDate)',
                'var' => [
                    [
                        'l' => 'pregnancyDay',
                        'f' => 'round(currentDate - matingDate)',
                        'r' => ['currentDate', 'matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'earliest = matingDate + 331',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'earliest - 331',
                        'r' => ['earliest'],
                    ],
                    [
                        'l' => 'earliest',
                        'f' => 'matingDate + 331',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'latest = matingDate + 346',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'latest - 346',
                        'r' => ['latest'],
                    ],
                    [
                        'l' => 'latest',
                        'f' => 'matingDate + 346',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'weekday = getDayOfWeek(date)',
                'var' => [
                    [
                        'l' => 'weekday',
                        'f' => 'getDayOfWeek(date)',
                        'r' => ['date'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";omni.define("getDayOfWeek",function(dateInput){var day=new Date(dateInput*86400000);return day.getUTCDay()});//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Foaling date into Horse gestation and the answer comes back as Mating date. There is no hidden constant here: change Mating date and Foaling date moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Horse gestation calculator works', 'html' => <<<'TXT'
            <p>The Horse gestation calculator applies one relationship to 1 number and reports Mating date.</p><p>The relationship it solves reads Mating date = Foaling date − 338.</p><p>The result panel carries Mating date, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Foaling date</strong> — a plain number, no unit, entered as a date. The estimated delivery date.</li></ul><p>What you get back is Mating date, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Foaling date = 1.772e+12 gives &lt;strong&gt;Mating date&lt;/strong&gt; = 1.743e+12.</p><ul><li><strong>Mating date</strong> = 1.743e+12</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Mating date</strong> = <code>Foaling date − 338</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Mating date&lt;/strong&gt; = 1.743e+12. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Mating date is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mating date</strong> = <code>Foaling date − 338</code></li><li><strong>Foaling date</strong> = <code>Mating date + 338</code></li><li><strong>difference</strong> = <code>round( − currentDate + Foaling date)</code></li><li><strong>currentDate</strong> = <code>Foaling date + difference_negated</code></li><li><strong>difference_negated</strong> = <code>currentDate − Foaling date</code></li><li><strong>pregnancyDay</strong> = <code>round(currentDate − Mating date)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Mating date</strong> = <code>Foaling date − 338</code> — the form to use when Foaling date are the values you have.</li><li><strong>Foaling date</strong> = <code>Mating date + 338</code> — the form to use when Mating date are the values you have.</li><li><strong>difference</strong> = <code>round( − currentDate + Foaling date)</code> — the form to use when Foaling date are the values you have.</li><li><strong>currentDate</strong> = <code>Foaling date + difference_negated</code> — the form to use when Foaling date are the values you have.</li><li><strong>difference_negated</strong> = <code>currentDate − Foaling date</code> — the form to use when Foaling date are the values you have.</li><li><strong>Foaling date</strong> = <code>currentDate − difference_negated</code> — the form to use when the other values are known.</li><li><strong>pregnancyDay</strong> = <code>round(currentDate − Mating date)</code> — the form to use when Mating date are the values you have.</li><li><strong>Mating date</strong> = <code>earliest − 331</code> — the form to use when the other values are known.</li></ul><p>Any one of Mating date, Foaling date and difference can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Foaling date from 1.772e+12 to 3.545e+12, leaving every other box alone. The panel moves from &lt;strong&gt;Mating date&lt;/strong&gt; 1.743e+12 to &lt;strong&gt;Mating date&lt;/strong&gt; 3.515e+12.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Mating date is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Foaling date left as a guess.</strong> Anything typed into Foaling date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Foaling date to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Horse gestation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Foaling date</strong> takes a plain number with no unit attached. The estimated delivery date. Change it and Mating date changes with it. Fill it from a measurement rather than a memory — Foaling date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Mating date</strong> is a plain number and the page's own defaults put it at 1.743e+12. It is worked out from Foaling date. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Mating date</th></tr></thead><tbody><tr><td><strong>Foaling date</strong> +10%</td><td>+10.17%</td></tr></tbody></table><p>The steepest column belongs to Foaling date: ten per cent there moves an answer by about 10.2 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Foaling date = 8.862e+11 and the page reports <strong>Mating date</strong> = 8.570e+11, <strong>earliest</strong> = 8.856e+11, <strong>latest</strong> = 8.869e+11 and <strong>weekday</strong> = 5.</li><li>Feed in Foaling date = 5.317e+12 and the page reports <strong>Mating date</strong> = 5.288e+12, <strong>earliest</strong> = 5.316e+12, <strong>latest</strong> = 5.318e+12 and <strong>weekday</strong> = 6.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Foaling date ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Foaling date — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Mating date against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Mating date is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Foaling date are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Foaling date is what you already know and Mating date is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/plasmid-molar-ratio">Plasmid Molar Ratio Calculator</a>, <a href="/biology/potting-soil-calculator">Potting soil Calculator</a> and <a href="/biology/primer-dimer-checker">Primer Dimer Checker Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Horse gestation is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Horse gestation calculator work out?', 'a' => 'Mating date, from Foaling date. The relationship is Mating date = Foaling date − 338.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Foaling date. Enter date; Mating date is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Mating date, Foaling date, difference and currentDate blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Mating date = 1.743e+12. The figures come from Foaling date as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Mating date is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Foaling date blank and the page solves for it, reporting Mating date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Mating date at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/plasmid-molar-ratio', 'name' => 'Plasmid Molar Ratio Calculator'],
            ['path' => '/biology/potting-soil-calculator', 'name' => 'Potting soil Calculator'],
            ['path' => '/biology/primer-dimer-checker', 'name' => 'Primer Dimer Checker Calculator'],
        ],
        'authors' => [],
    ],
];
