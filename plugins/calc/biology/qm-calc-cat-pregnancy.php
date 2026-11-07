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
    'meta' => ['title' => 'Cat pregnancy Calculator — Formula & Results', 'description' => 'Cat pregnancy works out due date from mating date. Any box can be the unknown. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Cat pregnancy Calculator', 'updated' => '2026-09-28'],
    'raw' => [
        'vars' => [
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'dateMili' => ['type' => 'date', 'rnd' => null],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.01'],
            ],
            'dueDate' => ['type' => 'date', 'rnd' => null],
            'dueDateDay' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'earliestDue' => ['type' => 'date', 'rnd' => null],
            'latestDue' => ['type' => 'date', 'rnd' => null],
            'matingDate' => ['type' => 'date', 'rnd' => null],
            'negativeDiff' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'S5I6ds_9xrc8wZcD8oPvT',
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
                                ['t' => 'v', 'n' => 'dueDate', 'vt' => 'date', 'l' => 'Due date'],
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
                                        [null, '🐈 Your cat\'s due date is on a&nbsp;'],
                                        ['dueDateDay == 0', 'Sunday!'],
                                        ['dueDateDay == 1', 'Monday!'],
                                        ['dueDateDay == 2', 'Tuesday!'],
                                        ['dueDateDay == 3', 'Wednesday!'],
                                        ['dueDateDay == 4', 'Thursday!'],
                                        ['dueDateDay == 5', 'Friday!'],
                                        ['dueDateDay == 6', 'Saturday!'],
                                        ['difference > 0', '&nbsp; 🐱 Your cat is going to give birth in around {{difference.formattedValue}} day(s)!'],
                                        ['difference <= 0', '&nbsp; 🐱 Your cat gave birth {{negativeDiff.formattedValue}} day(s) ago!&nbsp;'],
                                        [null, 'The earliest possible delivery date is: {{earliestDue.formattedValue}} The latest possible delivery date is: {{latestDue.formattedValue}}'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'f5Ct3xKzr8RYjuFhFs_hv',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
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
                                ['t' => 'v', 'n' => 'difference', 'vt' => 'numerical', 'l' => 'Difference'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dateMili', 'vt' => 'date', 'l' => 'Date mili'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dueDateDay', 'vt' => 'numerical', 'l' => 'Due date day'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'earliestDue', 'vt' => 'date', 'l' => 'Earliest due'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'latestDue', 'vt' => 'date', 'l' => 'Latest due'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'negativeDiff', 'vt' => 'numerical', 'l' => 'Negative diff'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'matingDate + 63 = dueDate',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'matingDate + 63',
                        'r' => ['matingDate'],
                    ],
                    [
                        'l' => 'matingDate',
                        'f' => 'dueDate - 63',
                        'r' => ['dueDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference = dueDate - currentDate',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'currentDate + difference',
                        'r' => ['currentDate', 'difference'],
                    ],
                    [
                        'l' => 'currentDate',
                        'f' => '-difference + dueDate',
                        'r' => ['dueDate', 'difference'],
                    ],
                    [
                        'l' => 'difference',
                        'f' => '-currentDate + dueDate',
                        'r' => ['dueDate', 'currentDate'],
                    ],
                ],
            ],
            [
                'formula' => 'dateMili = dueDate',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'dateMili',
                        'r' => ['dateMili'],
                    ],
                    [
                        'l' => 'dateMili',
                        'f' => 'dueDate',
                        'r' => ['dueDate'],
                    ],
                ],
            ],
            [
                'formula' => 'dueDateDay = getDueDate(dateMili)',
                'var' => [
                    [
                        'l' => 'dueDateDay',
                        'f' => 'getDueDate(dateMili)',
                        'r' => ['dateMili'],
                    ],
                ],
            ],
            [
                'formula' => 'earliestDue = matingDate + 58',
                'var' => [
                    [
                        'l' => 'earliestDue',
                        'f' => 'matingDate + 58',
                        'r' => ['matingDate'],
                    ],
                    [
                        'l' => 'matingDate',
                        'f' => 'earliestDue - 58',
                        'r' => ['earliestDue'],
                    ],
                ],
            ],
            [
                'formula' => 'latestDue = matingDate + 71',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'latestDue - 71',
                        'r' => ['latestDue'],
                    ],
                    [
                        'l' => 'latestDue',
                        'f' => 'matingDate + 71',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'negativeDiff = difference * -1',
                'var' => [
                    [
                        'l' => 'negativeDiff',
                        'f' => '-difference',
                        'r' => ['difference'],
                    ],
                    [
                        'l' => 'difference',
                        'f' => '-negativeDiff',
                        'r' => ['negativeDiff'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => <<<'TXT'
        "use strict";omni.define("getDueDate",function(dateInput){var dateInputMili=dateInput*24*60*60*1000;var date=new Date(dateInputMili);return date.getUTCDay()});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => 'Cat pregnancy works out Due date from Mating date. There is no hidden constant here: change due date and mating date moves with it.',
        'sections' => [
            ['title' => 'How the Cat pregnancy calculator works', 'html' => <<<'TXT'
            <p>Cat pregnancy answers one question from 1 number, and the answer is Due date.</p><p>The relationship it solves reads Due date = Mating date + 63.</p><p>The answers are Due date; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Mating date</strong> — a plain number, no unit, entered as a date</li></ul><p>The result box is Due date. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Mating date = 1.772e+12 — through the same formula and the panel reports <strong>Due date</strong> = 1.778e+12.</p><ul><li><strong>Due date</strong> = 1.778e+12</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Due date</strong> = <code>Mating date + 63</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Due date</strong> = 1.778e+12. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Due date is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Due date</strong> = <code>Mating date + 63</code></li><li><strong>Mating date</strong> = <code>Due date − 63</code></li><li><strong>currentDate</strong> = <code>− difference + Due date</code></li><li><strong>difference</strong> = <code>− currentDate + Due date</code></li><li><strong>dateMili</strong> = <code>Due date</code></li><li><strong>dueDateDay</strong> = <code>getDueDate(dateMili)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Due date</strong> = <code>Mating date + 63</code> — the form to use when Mating date are the values you have.</li><li><strong>Mating date</strong> = <code>Due date − 63</code> — the form to use when Due date are the values you have.</li><li><strong>Due date</strong> = <code>currentDate + difference</code> — the form to use when the other values are known.</li><li><strong>currentDate</strong> = <code>− difference + Due date</code> — the form to use when Due date are the values you have.</li><li><strong>difference</strong> = <code>− currentDate + Due date</code> — the form to use when Due date are the values you have.</li><li><strong>Due date</strong> = <code>dateMili</code> — the form to use when the other values are known.</li><li><strong>dateMili</strong> = <code>Due date</code> — the form to use when Due date are the values you have.</li><li><strong>dueDateDay</strong> = <code>getDueDate(dateMili)</code> — the form to use when the other values are known.</li></ul><p>Any one of Due date, Mating date and currentDate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Mating date from 1.772e+12 to 3.545e+12, leaving every other box alone. The panel moves from <strong>Due date</strong> 1.778e+12 to <strong>Due date</strong> 3.550e+12.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Due date is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Mating date left as a guess.</strong> Anything typed into Mating date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Mating date is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cat pregnancy form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Mating date</strong> takes a plain number with no unit attached. The page reads it when it works out Due date. Fill it from a measurement rather than a memory — Mating date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Due date</strong> is a plain number and the page's own defaults put it at 1.778e+12. It is worked out from Mating date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Due date</th></tr></thead><tbody><tr><td><strong>Mating date</strong> +10%</td><td>+9.97%</td></tr></tbody></table><p>The steepest column belongs to Mating date: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Mating date = 8.862e+11 and the page reports <strong>Due date</strong> = 8.916e+11, <strong>dateMili</strong> = 8.916e+11, <strong>earliestDue</strong> = 8.912e+11 and <strong>latestDue</strong> = 8.923e+11.</li><li>Feed in Mating date = 5.317e+12 and the page reports <strong>Due date</strong> = 5.322e+12, <strong>dateMili</strong> = 5.322e+12, <strong>earliestDue</strong> = 5.322e+12 and <strong>latestDue</strong> = 5.323e+12.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Mating date ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Mating date — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Due date against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Due date is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Mating date are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Mating date and the number you are missing is Due date.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/pcr-cycle-calculator">PCR Cycle Calculator</a>, <a href="/biology/pcr-master-mix-calculator">PCR Master Mix Calculator</a> and <a href="/biology/pcr-primer-stats">PCR Primer Stats Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Cat pregnancy is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Cat pregnancy is a number to act on, so the useful question is what to do with Due date once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Mating date alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat pregnancy calculator work out?', 'a' => 'Due date, from Mating date. The relationship is Due date = Mating date + 63.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mating date. Fill mating date and leave Due date empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Due date, Mating date, currentDate and difference blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Due date = 1.778e+12. Those are the defaults written into the form — move Mating date and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Due date is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mating date blank and the page solves for it, reporting Due date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Due date keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-cycle-calculator', 'name' => 'PCR Cycle Calculator'],
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
            ['path' => '/biology/pcr-primer-stats', 'name' => 'PCR Primer Stats Calculator'],
        ],
        'authors' => [],
    ],
];
