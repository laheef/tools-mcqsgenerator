<?php

/**
 * Cat pregnancy
 * /biology/cat-pregnancy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat pregnancy',
    'meta' => ['title' => 'Cat pregnancy Calculator: Formula & Example', 'description' => 'Cat pregnancy takes mating date and returns due date. A worked example follows. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Cat pregnancy Calculator', 'updated' => '2026-09-28'],
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
                        ['name' => 'dueDate', 'label' => 'Due date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => ' Your cat\'s due date is on a&nbsp;'],
                                ['when' => 'dueDateDay == 0', 'text' => 'Sunday!'],
                                ['when' => 'dueDateDay == 1', 'text' => 'Monday!'],
                                ['when' => 'dueDateDay == 2', 'text' => 'Tuesday!'],
                                ['when' => 'dueDateDay == 3', 'text' => 'Wednesday!'],
                                ['when' => 'dueDateDay == 4', 'text' => 'Thursday!'],
                                ['when' => 'dueDateDay == 5', 'text' => 'Friday!'],
                                ['when' => 'dueDateDay == 6', 'text' => 'Saturday!'],
                                ['when' => 'difference > 0', 'text' => '&nbsp;  Your cat is going to give birth in around {{difference.formattedValue}} day(s)!'],
                                ['when' => 'difference <= 0', 'text' => '&nbsp;  Your cat gave birth {{negativeDiff.formattedValue}} day(s) ago!&nbsp;'],
                                ['when' => null, 'text' => 'The earliest possible delivery date is: {{earliestDue.formattedValue}} The latest possible delivery date is: {{latestDue.formattedValue}}'],
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
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'dateMili', 'label' => 'Date mili', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dueDateDay',
                            'label' => 'Due date day',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'earliestDue', 'label' => 'Earliest due', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'latestDue', 'label' => 'Latest due', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'negativeDiff',
                            'label' => 'Negative diff',
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
            'title' => 'matingDate + 63 = dueDate',
            'results' => ['dueDate' => 'matingDate + 63', 'matingDate' => 'dueDate - 63'],
        ],
        [
            'title' => 'difference = dueDate - currentDate',
            'results' => ['dueDate' => 'currentDate + difference', 'currentDate' => '-difference + dueDate', 'difference' => '-currentDate + dueDate'],
        ],
        [
            'title' => 'dateMili = dueDate',
            'results' => ['dueDate' => 'dateMili', 'dateMili' => 'dueDate'],
        ],
        [
            'title' => 'dueDateDay = getDueDate(dateMili)',
            'results' => ['dueDateDay' => 'getDueDate(dateMili)'],
        ],
        [
            'title' => 'earliestDue = matingDate + 58',
            'results' => ['earliestDue' => 'matingDate + 58', 'matingDate' => 'earliestDue - 58'],
        ],
        [
            'title' => 'latestDue = matingDate + 71',
            'results' => ['matingDate' => 'latestDue - 71', 'latestDue' => 'matingDate + 71'],
        ],
        [
            'title' => 'negativeDiff = difference * -1',
            'results' => ['negativeDiff' => '-difference', 'difference' => '-negativeDiff'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getDueDate",function(dateInput){var dateInputMili=dateInput*24*60*60*1000;var date=new Date(dateInputMili);return date.getUTCDay()});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'Cat pregnancy works out Mating date and Current date from Due date. There is no hidden constant here: change mating date and due date moves with it.',
        'sections' => [
            ['title' => 'How the Cat pregnancy calculator works', 'html' => <<<'TXT'
            <p>Cat pregnancy answers one question from 1 number, and the answer is Mating date, Current date and Difference.</p><p>The relationship it solves reads Due date = Mating date + 63.</p><p>The answers are Mating date, Current date, Difference and Date mili; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Due date</strong> — a plain number, no unit, entered as a date</li></ul><p>The result boxes are Mating date, Current date, Difference, Date mili, Due date day, Earliest due, Latest due, Negative diff; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Due date = Sun 1 March 2026 — through the same formula and the panel reports <strong>Mating date</strong> = Sun 28 December 2025, <strong>Date mili</strong> = Sun 1 March 2026, <strong>Earliest due</strong> = Tue 24 February 2026 and <strong>Latest due</strong> = Mon 9 March 2026.</p><ul><li><strong>Mating date</strong> = Sun 28 December 2025</li><li><strong>Date mili</strong> = Sun 1 March 2026</li><li><strong>Earliest due</strong> = Tue 24 February 2026</li><li><strong>Latest due</strong> = Mon 9 March 2026</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Due date</strong> = <code>Mating date + 63</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Mating date</strong> = Sun 28 December 2025, <strong>Date mili</strong> = Sun 1 March 2026, <strong>Earliest due</strong> = Tue 24 February 2026 and <strong>Latest due</strong> = Mon 9 March 2026. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Mating date is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Due date</strong> = <code>Mating date + 63</code></li><li><strong>Mating date</strong> = <code>Due date − 63</code></li><li><strong>Difference</strong> = <code>− Current date + Due date</code></li><li><strong>Current date</strong> = <code>− Difference + Due date</code></li><li><strong>Date mili</strong> = <code>Due date</code></li><li><strong>Due date day</strong> = <code>getDueDate(Date mili)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Due date</strong> = <code>Mating date + 63</code> — the form to use when Mating date are the values you have.</li><li><strong>Mating date</strong> = <code>Due date − 63</code> — the form to use when Due date are the values you have.</li><li><strong>Difference</strong> = <code>− Current date + Due date</code> — the form to use when Current date and Due date are the values you have.</li><li><strong>Due date</strong> = <code>Current date + Difference</code> — the form to use when Current date and Difference are the values you have.</li><li><strong>Current date</strong> = <code>− Difference + Due date</code> — the form to use when Difference and Due date are the values you have.</li><li><strong>Date mili</strong> = <code>Due date</code> — the form to use when Due date are the values you have.</li><li><strong>Due date</strong> = <code>Date mili</code> — the form to use when Date mili are the values you have.</li><li><strong>Due date day</strong> = <code>getDueDate(Date mili)</code> — the form to use when Date mili are the values you have.</li></ul><p>Any one of Due date, Mating date and Difference can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Due date from Sun 1 March 2026 to Wed 29 April 2082, leaving every other box alone. The panel moves from <strong>Mating date</strong> Sun 28 December 2025, <strong>Date mili</strong> Sun 1 March 2026, <strong>Earliest due</strong> Tue 24 February 2026 and <strong>Latest due</strong> Mon 9 March 2026 to <strong>Mating date</strong> Wed 25 February 2082, <strong>Date mili</strong> Wed 29 April 2082, <strong>Earliest due</strong> Fri 24 April 2082 and <strong>Latest due</strong> Thu 7 May 2082.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Mating date, Current date and Difference are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Due date left as a guess.</strong> Anything typed into Due date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Due date is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cat pregnancy form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Due date</strong> takes a plain number with no unit attached. The page reads it when it works out Mating date, Current date and Difference. Fill it from a measurement rather than a memory — Due date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Mating date</strong> is a plain number and the page's own defaults put it at Sun 28 December 2025. It is worked out from Due date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Current date</strong> is a plain number. It is worked out from Difference and Due date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Difference</strong> is a plain number. It is worked out from Current date and Due date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Date mili</strong> is a plain number and the page's own defaults put it at Sun 1 March 2026. It is worked out from Due date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Due date day</strong> is a plain number. It is worked out from Date mili. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Earliest due</strong> is a plain number and the page's own defaults put it at Tue 24 February 2026. It is worked out from Mating date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Latest due</strong> is a plain number and the page's own defaults put it at Mon 9 March 2026. It is worked out from Mating date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Negative diff</strong> is a plain number. It is worked out from Difference. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Mating date</th><th>Date mili</th><th>Earliest due</th><th>Latest due</th></tr></thead><tbody><tr><td><strong>Due date</strong> +10%</td><td>+10.03%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Due date: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Due date = Fri 30 January 1998 and the page reports <strong>Mating date</strong> = Fri 28 November 1997, <strong>Date mili</strong> = Fri 30 January 1998, <strong>Earliest due</strong> = Sun 25 January 1998 and <strong>Latest due</strong> = Sat 7 February 1998.</li><li>Feed in Due date = Sat 28 June 2138 and the page reports <strong>Mating date</strong> = Sat 26 April 2138, <strong>Date mili</strong> = Sat 28 June 2138, <strong>Earliest due</strong> = Mon 23 June 2138 and <strong>Latest due</strong> = Sun 6 July 2138.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Mating date is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Due date are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Due date and the number you are missing is Mating date and Current date.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat pregnancy calculator work out?', 'a' => 'Mating date, Current date, Difference and Date mili, from Mating date. The relationship is Due date = Mating date + 63.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Due date. Fill due date and leave Mating date empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Due date, Mating date, Difference and Current date blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Mating date = Sun 28 December 2025, Date mili = Sun 1 March 2026, Earliest due = Tue 24 February 2026 and Latest due = Mon 9 March 2026. Those are the defaults written into the form — move Due date and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Mating date is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Due date blank and the page solves for it, reporting Mating date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Mating date keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-cycle-calculator', 'name' => 'PCR Cycle Calculator'],
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
            ['path' => '/biology/pcr-primer-stats', 'name' => 'PCR Primer Stats Calculator'],
        ],
        'authors' => [],
    ],
];
