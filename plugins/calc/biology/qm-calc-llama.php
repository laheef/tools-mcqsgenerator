<?php

/**
 * Llama
 * /biology/llama
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Llama',
    'meta' => ['title' => 'Llama Calculator: Formula, Steps & Examples', 'description' => <<<'TXT'
    Llama takes ❤️ Mating date and returns 🦙 Due date. The formula is printed in the form's own words, so the arithmetic can be checked. Every figure is computed.
    TXT, 'h1' => 'Llama Calculator', 'updated' => '2025-04-07'],
    'raw' => [
        'vars' => [
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'difference_negative' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference_positive' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference_value' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'dueDate' => ['type' => 'date', 'rnd' => null],
            'earliest' => ['type' => 'date', 'rnd' => null],
            'latest' => ['type' => 'date', 'rnd' => null],
            'matingDate' => ['type' => 'date', 'rnd' => null],
            'weekday' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'Kdz1dFDTJtt6e9cE1HlIv',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'matingDate', 'vt' => 'date', 'l' => '❤️ Mating date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dueDate', 'vt' => 'date', 'l' => ' 🦙 Due date'],
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
                                        ['difference_value == 0', 'Your llama or alpaca is going to give birth today!'],
                                        ['difference_value == 1', 'Your llama or alpaca is going to give birth in {{difference_positive.formattedValue}} day!'],
                                        ['difference_value > 1', 'Your llama or alpaca is going to give birth in {{difference_positive.formattedValue}} days!'],
                                        ['difference_value == -1', 'Your llama or alpaca gave birth 1 day ago!'],
                                        ['difference_value < -1', 'Your llama or alpaca gave birth {{difference_negative.formattedValue}} days ago!'],
                                        ['difference_value == 0', 'Today is&nbsp;'],
                                        ['difference_value > 0', 'Your llama\'s or alpaca\'s due date is on a&nbsp;'],
                                        ['difference_value < 0', 'Your llama\'s or alpaca\'s due date was on a&nbsp;'],
                                        ['weekday==0', 'Sunday!'],
                                        ['weekday==1', 'Monday!'],
                                        ['weekday==2', 'Tuesday!'],
                                        ['weekday==3', 'Wednesday!'],
                                        ['weekday==4', 'Thursday!'],
                                        ['weekday==5', 'Friday!'],
                                        ['weekday==6', 'Saturday!'],
                                        [null, 'The earliest normal delivery: {{earliest.shortValue}} The latest normal delivery: {{latest.shortValue}}'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'njm_51Yf4CE5qtBB5rF1b',
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
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'difference_positive',
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
                                    'n' => 'difference_negative',
                                    'vt' => 'numerical',
                                    'l' => 'Difference negative',
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
                                ['t' => 'v', 'n' => 'difference_value', 'vt' => 'numerical', 'l' => 'Difference value'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'dueDate = matingDate + 342*86400000',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'dueDate - 29548800000',
                        'r' => ['dueDate'],
                    ],
                    [
                        'l' => 'dueDate',
                        'f' => 'matingDate + 29548800000',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'earliest = matingDate + 332*86400000',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'earliest - 28684800000',
                        'r' => ['earliest'],
                    ],
                    [
                        'l' => 'earliest',
                        'f' => 'matingDate + 28684800000',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'latest = matingDate + 352*86400000',
                'var' => [
                    [
                        'l' => 'matingDate',
                        'f' => 'latest - 30412800000',
                        'r' => ['latest'],
                    ],
                    [
                        'l' => 'latest',
                        'f' => 'matingDate + 30412800000',
                        'r' => ['matingDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_positive = dueDate - (currentDate - mod(currentDate,86400000))',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'currentDate + difference_positive - mod(currentDate, 86400000)',
                        'r' => ['difference_positive', 'currentDate'],
                    ],
                    [
                        'l' => 'difference_positive',
                        'f' => '-currentDate + dueDate + mod(currentDate, 86400000)',
                        'r' => ['dueDate', 'currentDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_negative = (currentDate - mod(currentDate,86400000)) - dueDate',
                'var' => [
                    [
                        'l' => 'dueDate',
                        'f' => 'currentDate - difference_negative - mod(currentDate, 86400000)',
                        'r' => ['difference_negative', 'currentDate'],
                    ],
                    [
                        'l' => 'difference_negative',
                        'f' => 'currentDate - dueDate - mod(currentDate, 86400000)',
                        'r' => ['dueDate', 'currentDate'],
                    ],
                ],
            ],
            [
                'formula' => 'weekday = getDayOfWeek(dueDate)',
                'var' => [
                    [
                        'l' => 'weekday',
                        'f' => 'getDayOfWeek(dueDate)',
                        'r' => ['dueDate'],
                    ],
                ],
            ],
            [
                'formula' => 'difference_value = difference_positive/86400000',
                'var' => [
                    [
                        'l' => 'difference_value',
                        'f' => '(1/86400000)*difference_positive',
                        'r' => ['difference_positive'],
                    ],
                    [
                        'l' => 'difference_positive',
                        'f' => '86400000*difference_value',
                        'r' => ['difference_value'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";omni.define("getDayOfWeek",function(dateInput){var day=new Date(dateInput);return day.getUTCDay()});//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter ❤️ Mating date into Llama and the answer comes back as 🦙 Due date. There is no hidden constant here: change 🦙 Due date and ❤️ Mating date moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Llama calculator works', 'html' => <<<'TXT'
            <p>Llama answers one question from 1 number, and the answer is 🦙 Due date.</p><p>Written with the labels from the form, ❤️ Mating date = 🦙 Due date − 29548800000.</p><p>The answers are 🦙 Due date; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>❤️ Mating date</strong> — a plain number, no unit, entered as a date</li></ul><p>What you get back is 🦙 Due date, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — ❤️ Mating date = 1.772e+12 — through the same formula and the panel reports <strong>🦙 Due date</strong> = 1.802e+12.</p><ul><li><strong>🦙 Due date</strong> = 1.802e+12</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>❤️ Mating date</strong> = <code>🦙 Due date − 29548800000</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>🦙 Due date</strong> = 1.802e+12. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as 🦙 Due date is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>❤️ Mating date</strong> = <code>🦙 Due date − 29548800000</code></li><li><strong>🦙 Due date</strong> = <code>❤️ Mating date + 29548800000</code></li><li><strong>earliest</strong> = <code>❤️ Mating date + 28684800000</code></li><li><strong>latest</strong> = <code>❤️ Mating date + 30412800000</code></li><li><strong>difference_positive</strong> = <code>− currentDate + 🦙 Due date + mod(currentDate, 86400000)</code></li><li><strong>difference_negative</strong> = <code>currentDate − 🦙 Due date − mod(currentDate, 86400000)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>❤️ Mating date</strong> = <code>🦙 Due date − 29548800000</code> — the form to use when 🦙 Due date are the values you have.</li><li><strong>🦙 Due date</strong> = <code>❤️ Mating date + 29548800000</code> — the form to use when ❤️ Mating date are the values you have.</li><li><strong>❤️ Mating date</strong> = <code>earliest − 28684800000</code> — the form to use when the other values are known.</li><li><strong>earliest</strong> = <code>❤️ Mating date + 28684800000</code> — the form to use when ❤️ Mating date are the values you have.</li><li><strong>❤️ Mating date</strong> = <code>latest − 30412800000</code> — the form to use when the other values are known.</li><li><strong>latest</strong> = <code>❤️ Mating date + 30412800000</code> — the form to use when ❤️ Mating date are the values you have.</li><li><strong>🦙 Due date</strong> = <code>currentDate + difference_positive − mod(currentDate, 86400000)</code> — the form to use when the other values are known.</li><li><strong>difference_positive</strong> = <code>− currentDate + 🦙 Due date + mod(currentDate, 86400000)</code> — the form to use when 🦙 Due date are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of ❤️ Mating date, 🦙 Due date and earliest can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double ❤️ Mating date from 1.772e+12 to 3.545e+12, leaving every other box alone. The panel moves from <strong>🦙 Due date</strong> 1.802e+12 to <strong>🦙 Due date</strong> 3.574e+12.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> 🦙 Due date is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>❤️ Mating date left as a guess.</strong> Anything typed into ❤️ Mating date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert ❤️ Mating date to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Llama form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>❤️ Mating date</strong> takes a plain number with no unit attached. The page reads it when it works out 🦙 Due date. Fill it from a measurement rather than a memory — ❤️ Mating date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>🦙 Due date</strong> is a plain number and the page's own defaults put it at 1.802e+12. The value follows from ❤️ Mating date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>🦙 Due date</th></tr></thead><tbody><tr><td><strong>❤️ Mating date</strong> +10%</td><td>+9.84%</td></tr></tbody></table><p>The steepest column belongs to ❤️ Mating date: ten per cent there moves an answer by about 9.8 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in ❤️ Mating date = 8.862e+11 and the page reports <strong>🦙 Due date</strong> = 9.157e+11, <strong>earliest</strong> = 9.148e+11, <strong>latest</strong> = 9.166e+11 and <strong>weekday</strong> = 1.</li><li>Feed in ❤️ Mating date = 5.317e+12 and the page reports <strong>🦙 Due date</strong> = 5.347e+12, <strong>earliest</strong> = 5.346e+12, <strong>latest</strong> = 5.347e+12 and <strong>weekday</strong> = 5.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have ❤️ Mating date ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with ❤️ Mating date — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check 🦙 Due date against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind 🦙 Due date is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes ❤️ Mating date are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: ❤️ Mating date measured, 🦙 Due date wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/grass-seed">Grass seed Calculator</a>, <a href="/biology/growing-degree-days">Growing Degree Days Calculator</a> and <a href="/biology/guinea-pig-pregnancy">Guinea pig pregnancy</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Llama is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Llama is a number to act on, so the useful question is what to do with 🦙 Due date once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down ❤️ Mating date alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Llama calculator work out?', 'a' => '🦙 Due date, from 🦙 Due date. The relationship is ❤️ Mating date = 🦙 Due date − 29548800000.'],
            ['q' => 'Which values do I need before I start?', 'a' => '❤️ Mating date. With ❤️ Mating date in place, 🦙 Due date can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. ❤️ Mating date, 🦙 Due date, earliest and latest can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => '🦙 Due date = 1.802e+12. The figures come from ❤️ Mating date as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            🦙 Due date is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave ❤️ Mating date blank and the page solves for it, reporting 🦙 Due date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of 🦙 Due date keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/grass-seed', 'name' => 'Grass seed Calculator'],
            ['path' => '/biology/growing-degree-days', 'name' => 'Growing Degree Days Calculator'],
            ['path' => '/biology/guinea-pig-pregnancy', 'name' => 'Guinea pig pregnancy'],
        ],
        'authors' => [],
    ],
];
