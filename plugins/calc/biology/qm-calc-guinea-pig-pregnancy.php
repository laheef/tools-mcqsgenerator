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
    'meta' => ['title' => 'Guinea pig pregnancy — Free Online Calculator', 'description' => 'Guinea pig pregnancy works out due date from breeding date. Every figure is computed. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Guinea pig pregnancy Calculator', 'updated' => '2026-08-06'],
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
        Enter Breeding date into Guinea pig pregnancy and the answer comes back as Due date. The arithmetic is the whole method: due date is worked out from breeding date by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Guinea pig pregnancy calculator works', 'html' => <<<'TXT'
            <p>Guinea pig pregnancy answers one question from 1 number, and the answer is Due date.</p><p>Written with the labels from the form, Due date = Breeding date + 65.</p><p>What comes back is Due date — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Breeding date</strong> — a plain number, no unit, entered as a date</li></ul><p>The answer comes back as Due date. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Breeding date = 1.772e+12; the answers are <strong>Due date</strong> = 1.778e+12.</p><ul><li><strong>Due date</strong> = 1.778e+12</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Due date</strong> = <code>Breeding date + 65</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Due date</strong> = 1.778e+12. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Due date is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Due date</strong> = <code>Breeding date + 65</code></li><li><strong>Breeding date</strong> = <code>Due date − 65</code></li><li><strong>difference</strong> = <code>round( − currentDate + Due date)</code></li><li><strong>difference_negated</strong> = <code>currentDate − Due date</code></li><li><strong>currentDate</strong> = <code>difference_negated + Due date</code></li><li><strong>pregnancyDay</strong> = <code>round( − Breeding date + currentDate)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Due date</strong> = <code>Breeding date + 65</code> — the form to use when Breeding date are the values you have.</li><li><strong>Breeding date</strong> = <code>Due date − 65</code> — the form to use when Due date are the values you have.</li><li><strong>difference</strong> = <code>round( − currentDate + Due date)</code> — the form to use when Due date are the values you have.</li><li><strong>difference_negated</strong> = <code>currentDate − Due date</code> — the form to use when Due date are the values you have.</li><li><strong>currentDate</strong> = <code>difference_negated + Due date</code> — the form to use when Due date are the values you have.</li><li><strong>Due date</strong> = <code>currentDate − difference_negated</code> — the form to use when the other values are known.</li><li><strong>pregnancyDay</strong> = <code>round( − Breeding date + currentDate)</code> — the form to use when Breeding date are the values you have.</li><li><strong>earliest</strong> = <code>Breeding date + 59</code> — the form to use when Breeding date are the values you have.</li></ul><p>Any one of Due date, Breeding date and difference can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Breeding date, from 1.772e+12 to 3.545e+12 — and the answers go from <strong>Due date</strong> 1.778e+12 to <strong>Due date</strong> 3.550e+12.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Due date is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Breeding date left as a guess.</strong> Anything typed into Breeding date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Breeding date to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Guinea pig pregnancy form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Breeding date</strong> takes a plain number with no unit attached. The page reads it when it works out Due date. Fill it from a measurement rather than a memory — Breeding date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Due date</strong> is a plain number and the page's own defaults put it at 1.778e+12. The value follows from Breeding date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Due date</th></tr></thead><tbody><tr><td><strong>Breeding date</strong> +10%</td><td>+9.97%</td></tr></tbody></table><p>The steepest column belongs to Breeding date: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Breeding date = 8.862e+11 and the page reports <strong>Due date</strong> = 8.918e+11, <strong>earliest</strong> = 8.913e+11 and <strong>latest</strong> = 8.924e+11.</li><li>Feed in Breeding date = 5.317e+12 and the page reports <strong>Due date</strong> = 5.323e+12, <strong>earliest</strong> = 5.322e+12 and <strong>latest</strong> = 5.323e+12.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Breeding date ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Breeding date — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Due date against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Due date is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Breeding date measured, Due date wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/tree-height">Tree height</a>, <a href="/biology/tree-spacing">Tree spacing</a> and <a href="/biology/tree-value">Tree value Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Guinea pig pregnancy is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Guinea pig pregnancy is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Breeding date beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Guinea pig pregnancy calculator work out?', 'a' => 'Due date, from Breeding date. The relationship is Due date = Breeding date + 65.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Breeding date. Enter breeding date; Due date is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Due date, Breeding date, difference and difference_negated blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Due date = 1.778e+12. The figures come from Breeding date as the page opens it; they are a starting point, not a fixed answer.'],
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
