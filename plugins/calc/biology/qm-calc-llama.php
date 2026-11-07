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
    'meta' => ['title' => 'Llama Calculator: Worked Example and Formulas', 'description' => 'Llama gestation dates the cria from the mating date: 342 days on average, with the 332 to 352 day window, the weekday it falls on and the days still to go.', 'h1' => 'Llama Calculator', 'updated' => '2025-04-07'],
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
                                ['t' => 'v', 'n' => 'matingDate', 'vt' => 'date', 'l' => ' Mating date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'dueDate', 'vt' => 'date', 'l' => '  Due date'],
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
        'intro' => 'Enter Mating date into Llama and the answer comes back as Due date and Weekday. There is no hidden constant here: change due date and mating date moves with it.',
        'sections' => [
            ['title' => 'How the Llama calculator works', 'html' => <<<'TXT'
            <p>Llama answers one question from 1 number, and the answer is Due date, Weekday and Earliest.</p><p>Written with the labels from the form, Due date = Mating date + 342 days.</p><p>The answers are Due date, Weekday, Earliest and Latest; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Mating date</strong> — a plain number, no unit, entered as a date</li></ul><p>What you get back is Due date, Weekday, Earliest, Latest, Difference, Difference negative, Difference value, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Mating date = Sun 1 March 2026 — through the same formula and the panel reports <strong>Due date</strong> = Sat 6 February 2027, <strong>Earliest</strong> = Wed 27 January 2027, <strong>Latest</strong> = Tue 16 February 2027 and <strong>Weekday</strong> = 6.</p><ul><li><strong>Due date</strong> = Sat 6 February 2027</li><li><strong>Earliest</strong> = Wed 27 January 2027</li><li><strong>Latest</strong> = Tue 16 February 2027</li><li><strong>Weekday</strong> = 6</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Due date</strong> = <code>Mating date + 342 days</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Due date</strong> = Sat 6 February 2027, <strong>Earliest</strong> = Wed 27 January 2027, <strong>Latest</strong> = Tue 16 February 2027 and <strong>Weekday</strong> = 6. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Due date is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Due date</strong> = <code>Mating date + 342 days</code></li><li><strong>Mating date</strong> = <code>Due date − 342 days</code></li><li><strong>Earliest</strong> = <code>Mating date + 332 days</code></li><li><strong>Latest</strong> = <code>Mating date + 352 days</code></li><li><strong>Difference</strong> = <code>− Current date + Due date + mod(Current date, 1 day)</code></li><li><strong>Difference negative</strong> = <code>Current date − Due date − mod(Current date, 1 day)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Due date</strong> = <code>Mating date + 342 days</code> — the form to use when Mating date are the values you have.</li><li><strong>Mating date</strong> = <code>Due date − 342 days</code> — the form to use when Due date are the values you have.</li><li><strong>Earliest</strong> = <code>Mating date + 332 days</code> — the form to use when Mating date are the values you have.</li><li><strong>Mating date</strong> = <code>Earliest − 332 days</code> — the form to use when Earliest are the values you have.</li><li><strong>Latest</strong> = <code>Mating date + 352 days</code> — the form to use when Mating date are the values you have.</li><li><strong>Mating date</strong> = <code>Latest − 352 days</code> — the form to use when Latest are the values you have.</li><li><strong>Difference</strong> = <code>− Current date + Due date + mod(Current date, 1 day)</code> — the form to use when Due date and Current date are the values you have.</li><li><strong>Due date</strong> = <code>Current date + Difference − mod(Current date, 1 day)</code> — the form to use when Difference and Current date are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Due date, Mating date and Earliest can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Mating date from Sun 1 March 2026 to Wed 29 April 2082, leaving every other box alone. The panel moves from <strong>Due date</strong> Sat 6 February 2027, <strong>Earliest</strong> Wed 27 January 2027, <strong>Latest</strong> Tue 16 February 2027 and <strong>Weekday</strong> 6 to <strong>Due date</strong> Tue 6 April 2083, <strong>Earliest</strong> Sat 27 March 2083, <strong>Latest</strong> Fri 16 April 2083 and <strong>Weekday</strong> 2.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Due date, Weekday and Earliest are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Mating date left as a guess.</strong> Anything typed into Mating date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Mating date to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Llama form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Mating date</strong> takes a plain number with no unit attached. The page reads it when it works out Due date, Earliest and Latest. Fill it from a measurement rather than a memory — Mating date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Due date</strong> is a plain number and the page's own defaults put it at Sat 6 February 2027. The value follows from Mating date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Weekday</strong> is a plain number and the page's own defaults put it at 6. The value follows from Due date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Earliest</strong> is a plain number and the page's own defaults put it at Wed 27 January 2027. The value follows from Mating date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Latest</strong> is a plain number and the page's own defaults put it at Tue 16 February 2027. The value follows from Mating date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Difference</strong> is a plain number. The value follows from Due date and Current date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Difference negative</strong> is a plain number. The value follows from Due date and Current date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Difference value</strong> is a plain number. The value follows from Difference. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Due date</th><th>Earliest</th><th>Latest</th><th>Weekday</th></tr></thead><tbody><tr><td><strong>Mating date</strong> +10%</td><td>+9.84%</td><td>+9.84%</td><td>+9.83%</td><td>-100%</td></tr></tbody></table><p>The steepest column belongs to Mating date: ten per cent there moves an answer by about 100 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Mating date = Fri 30 January 1998 and the page reports <strong>Due date</strong> = Thu 7 January 1999, <strong>Earliest</strong> = Mon 28 December 1998, <strong>Latest</strong> = Sun 17 January 1999 and <strong>Weekday</strong> = 1.</li><li>Feed in Mating date = Sat 28 June 2138 and the page reports <strong>Due date</strong> = Fri 5 June 2139, <strong>Earliest</strong> = Tue 26 May 2139, <strong>Latest</strong> = Mon 15 June 2139 and <strong>Weekday</strong> = 5.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Due date is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Mating date are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Mating date measured, Due date and Weekday wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/grass-seed">Grass seed Calculator</a>, <a href="/biology/growing-degree-days">Growing Degree Days Calculator</a> and <a href="/biology/guinea-pig-pregnancy">Guinea pig pregnancy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Llama calculator work out?', 'a' => 'Due date, Weekday, Earliest and Latest, from Mating date. The relationship is Due date = Mating date + 342 days.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mating date. With mating date in place, Due date can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Due date, Mating date, Earliest and Latest can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Due date = Sat 6 February 2027, Earliest = Wed 27 January 2027, Latest = Tue 16 February 2027 and Weekday = 6. The figures come from Mating date as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Due date is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mating date blank and the page solves for it, reporting Due date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Due date keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/grass-seed', 'name' => 'Grass seed Calculator'],
            ['path' => '/biology/growing-degree-days', 'name' => 'Growing Degree Days Calculator'],
            ['path' => '/biology/guinea-pig-pregnancy', 'name' => 'Guinea pig pregnancy'],
        ],
        'authors' => [],
    ],
];
