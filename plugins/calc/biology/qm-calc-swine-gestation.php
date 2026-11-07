<?php

/**
 * Swine gestation
 * /biology/swine-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Swine gestation',
    'meta' => ['title' => 'Swine gestation Calculator: Units & Formula', 'description' => 'Swine gestation turns breeding date into farrowing date. Nothing is stored between visits: the boxes are the only place your numbers live. No sign-up.', 'h1' => 'Swine gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'SuffixCheckJ' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'currentDate' => ['type' => 'date', 'rnd' => null],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'earliestDue' => ['type' => 'date', 'rnd' => null],
            'exposed' => ['type' => 'date', 'rnd' => null],
            'farrowing' => ['type' => 'date', 'rnd' => null],
            'latestDue' => ['type' => 'date', 'rnd' => null],
            'negativeDifference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'pregnancyDay' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'suffixCheckK' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'D1h-B2jHwb-zt_iCxH8Bm',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'exposed', 'vt' => 'date', 'l' => 'Breeding date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'farrowing', 'vt' => 'date', 'l' => 'Farrowing date'],
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
                                        ['difference > 0', ' Your sow is going to farrow in {{difference.formattedValue}}&nbsp;days!'],
                                        ['currentDate == farrowing', ' Your sow gave birth today!'],
                                        ['difference < 0', ' Your sow gave birth {{negativeDifference.formattedValue}}&nbsp;days ago!'],
                                        ['difference == 1', ' Your sow is going to farrow in {{difference.formattedValue}}&nbsp;day!'],
                                        ['negativeDifference == 1', ' Your sow gave birth {{negativeDifference.formattedValue}}&nbsp;day ago!'],
                                    ],
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
                                        ['not((SuffixCheckJ == 1 and suffixCheckK != 11) and (SuffixCheckJ == 2 and suffixCheckK != 12) and (SuffixCheckJ == 3 and suffixCheckK != 13))', 'Today is the {{pregnancyDay.formattedValue}}th day of the gestation.'],
                                        ['SuffixCheckJ == 1 and suffixCheckK != 11', 'Today is the {{pregnancyDay.formattedValue}}st day of the gestation.'],
                                        ['SuffixCheckJ == 2 and suffixCheckK != 12', 'Today is the {{pregnancyDay.formattedValue}}nd day of the gestation.'],
                                        ['SuffixCheckJ == 3 and suffixCheckK != 13', 'Today is the {{pregnancyDay.formattedValue}}rd day of the gestation.'],
                                    ],
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
                                        [null, '• Earliest possible farrowing: {{earliestDue.formattedValue}} • Latest possible farrowing: {{latestDue.formattedValue}}'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '1C80nZlSUPtZ0UNxCBscw',
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
                                ['t' => 'v', 'n' => 'negativeDifference', 'vt' => 'numerical', 'l' => 'Negative difference'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'pregnancyDay', 'vt' => 'numerical', 'l' => 'Pregnancy day'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'SuffixCheckJ', 'vt' => 'numerical', 'l' => 'Suffix check j'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'suffixCheckK', 'vt' => 'numerical', 'l' => 'Suffix check k'],
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
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'farrowing = exposed + 114',
                'var' => [
                    [
                        'l' => 'farrowing',
                        'f' => 'exposed + 114',
                        'r' => ['exposed'],
                    ],
                    [
                        'l' => 'exposed',
                        'f' => 'farrowing - 114',
                        'r' => ['farrowing'],
                    ],
                ],
            ],
            [
                'formula' => 'difference = round(farrowing - currentDate)',
                'var' => [
                    [
                        'l' => 'difference',
                        'f' => 'round(-currentDate + farrowing)',
                        'r' => ['currentDate', 'farrowing'],
                    ],
                ],
            ],
            [
                'formula' => 'negativeDifference = round(difference * -1)',
                'var' => [
                    [
                        'l' => 'negativeDifference',
                        'f' => 'round(-round(-currentDate + farrowing))',
                        'r' => ['currentDate', 'farrowing'],
                    ],
                ],
            ],
            [
                'formula' => 'pregnancyDay = round(currentDate - exposed)',
                'var' => [
                    [
                        'l' => 'pregnancyDay',
                        'f' => 'round(currentDate - exposed)',
                        'r' => ['currentDate', 'exposed'],
                    ],
                ],
            ],
            [
                'formula' => 'earliestDue = exposed + 112',
                'var' => [
                    [
                        'l' => 'earliestDue',
                        'f' => 'exposed + 112',
                        'r' => ['exposed'],
                    ],
                    [
                        'l' => 'exposed',
                        'f' => 'earliestDue - 112',
                        'r' => ['earliestDue'],
                    ],
                ],
            ],
            [
                'formula' => 'latestDue = exposed + 120',
                'var' => [
                    [
                        'l' => 'latestDue',
                        'f' => 'exposed + 120',
                        'r' => ['exposed'],
                    ],
                    [
                        'l' => 'exposed',
                        'f' => 'latestDue - 120',
                        'r' => ['latestDue'],
                    ],
                ],
            ],
            [
                'formula' => 'SuffixCheckJ = round(mod(pregnancyDay, 10))',
                'var' => [
                    [
                        'l' => 'SuffixCheckJ',
                        'f' => 'round(mod(round(currentDate - exposed), 10))',
                        'r' => ['currentDate', 'exposed'],
                    ],
                ],
            ],
            [
                'formula' => 'suffixCheckK = round(mod(pregnancyDay, 100))',
                'var' => [
                    [
                        'l' => 'suffixCheckK',
                        'f' => 'round(mod(round(currentDate - exposed), 100))',
                        'r' => ['currentDate', 'exposed'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Swine gestation takes Breeding date and returns Farrowing date and Difference. Nothing is looked up on this page: farrowing date is computed from breeding date and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Swine gestation calculator works', 'html' => <<<'TXT'
            <p>Swine gestation answers one question from 1 number, and the answer is Farrowing date, Difference and Negative difference.</p><p>Written with the labels from the form, Farrowing date = Breeding date + 114.</p><p>The result panel carries Farrowing date, Difference, Negative difference and Pregnancy day, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Breeding date</strong> — a plain number, no unit, entered as a date</li></ul><p>What you get back is Farrowing date, Difference, Negative difference, Pregnancy day, Suffix check j, Suffix check k, Earliest due, Latest due, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Breeding date = Sun 1 March 2026; the answers are <strong>Farrowing date</strong> = Tue 23 June 2026, <strong>Earliest due</strong> = Sun 21 June 2026 and <strong>Latest due</strong> = Mon 29 June 2026.</p><ul><li><strong>Farrowing date</strong> = Tue 23 June 2026</li><li><strong>Earliest due</strong> = Sun 21 June 2026</li><li><strong>Latest due</strong> = Mon 29 June 2026</li></ul><p>The line behind those figures is <strong>Farrowing date</strong> = <code>Breeding date + 114</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Farrowing date</strong> = Tue 23 June 2026, <strong>Earliest due</strong> = Sun 21 June 2026 and <strong>Latest due</strong> = Mon 29 June 2026 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Farrowing date takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Farrowing date</strong> = <code>Breeding date + 114</code></li><li><strong>Breeding date</strong> = <code>Farrowing date − 114</code></li><li><strong>Difference</strong> = <code>round( − Current date + Farrowing date)</code></li><li><strong>Negative difference</strong> = <code>round( − round( − Current date + Farrowing date))</code></li><li><strong>Pregnancy day</strong> = <code>round(Current date − Breeding date)</code></li><li><strong>Earliest due</strong> = <code>Breeding date + 112</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Farrowing date</strong> = <code>Breeding date + 114</code> — the form to use when Breeding date are the values you have.</li><li><strong>Breeding date</strong> = <code>Farrowing date − 114</code> — the form to use when Farrowing date are the values you have.</li><li><strong>Difference</strong> = <code>round( − Current date + Farrowing date)</code> — the form to use when Current date and Farrowing date are the values you have.</li><li><strong>Negative difference</strong> = <code>round( − round( − Current date + Farrowing date))</code> — the form to use when Current date and Farrowing date are the values you have.</li><li><strong>Pregnancy day</strong> = <code>round(Current date − Breeding date)</code> — the form to use when Current date and Breeding date are the values you have.</li><li><strong>Earliest due</strong> = <code>Breeding date + 112</code> — the form to use when Breeding date are the values you have.</li><li><strong>Breeding date</strong> = <code>Earliest due − 112</code> — the form to use when Earliest due are the values you have.</li><li><strong>Latest due</strong> = <code>Breeding date + 120</code> — the form to use when Breeding date are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Farrowing date, Breeding date and Difference can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Breeding date, from Sun 1 March 2026 to Wed 29 April 2082 — and the answers go from <strong>Farrowing date</strong> Tue 23 June 2026, <strong>Earliest due</strong> Sun 21 June 2026 and <strong>Latest due</strong> Mon 29 June 2026 to <strong>Farrowing date</strong> Fri 21 August 2082, <strong>Earliest due</strong> Wed 19 August 2082 and <strong>Latest due</strong> Thu 27 August 2082.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Farrowing date, Difference and Negative difference are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Breeding date left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Breeding date is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Breeding date and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Swine gestation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Breeding date</strong> takes a plain number with no unit attached. It feeds Farrowing date, Pregnancy day and Earliest due. Fill it from a measurement rather than a memory — Breeding date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 8 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Farrowing date</strong> is a plain number and the page's own defaults put it at Tue 23 June 2026. It is computed from Breeding date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Difference</strong> is a plain number. It is computed from Current date and Farrowing date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Negative difference</strong> is a plain number. It is computed from Current date and Farrowing date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Pregnancy day</strong> is a plain number. It is computed from Current date and Breeding date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Suffix check j</strong> is a plain number. It is computed from Current date and Breeding date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Suffix check k</strong> is a plain number. It is computed from Current date and Breeding date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Earliest due</strong> is a plain number and the page's own defaults put it at Sun 21 June 2026. It is computed from Breeding date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Latest due</strong> is a plain number and the page's own defaults put it at Mon 29 June 2026. It is computed from Breeding date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Farrowing date</th><th>Earliest due</th><th>Latest due</th></tr></thead><tbody><tr><td><strong>Breeding date</strong> +10%</td><td>+9.94%</td><td>+9.95%</td><td>+9.94%</td></tr></tbody></table><p>Ranked by leverage, Breeding date sits at the top — a ten per cent error in that box shows up as roughly 9.9 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Breeding date = Fri 30 January 1998 and the page reports <strong>Farrowing date</strong> = Sun 24 May 1998, <strong>Earliest due</strong> = Fri 22 May 1998 and <strong>Latest due</strong> = Sat 30 May 1998.</li><li>Feed in Breeding date = Sat 28 June 2138 and the page reports <strong>Farrowing date</strong> = Mon 20 October 2138, <strong>Earliest due</strong> = Sat 18 October 2138 and <strong>Latest due</strong> = Sun 26 October 2138.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Farrowing date follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Breeding date and the number you are missing is Farrowing date and Difference.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cell-dilution">Cell dilution Calculator</a>, <a href="/biology/cell-doubling-time">Cell doubling time Calculator</a> and <a href="/biology/cell-seeding-density">Cell Seeding Density Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Swine gestation calculator work out?', 'a' => 'Farrowing date, Difference, Negative difference and Pregnancy day, from Breeding date. The relationship is Farrowing date = Breeding date + 114.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Breeding date. Enter breeding date; Farrowing date is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Farrowing date, Breeding date, Difference and Negative difference can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Farrowing date = Tue 23 June 2026, Earliest due = Sun 21 June 2026 and Latest due = Mon 29 June 2026. Those are the defaults written into the form — move Breeding date and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Farrowing date is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Breeding date blank and the page solves for it, reporting Farrowing date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Farrowing date keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cell-dilution', 'name' => 'Cell dilution Calculator'],
            ['path' => '/biology/cell-doubling-time', 'name' => 'Cell doubling time Calculator'],
            ['path' => '/biology/cell-seeding-density', 'name' => 'Cell Seeding Density Calculator'],
        ],
        'authors' => [],
    ],
];
