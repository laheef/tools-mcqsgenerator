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
    'meta' => ['title' => 'Swine gestation Calculator: Units & Formula', 'description' => 'Swine gestation turns breeding date into farrowing date. Every figure is computed. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Swine gestation Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'exposed', 'label' => 'Breeding date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'farrowing', 'label' => 'Farrowing date', 'type' => 'date'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'difference > 0', 'text' => ' Your sow is going to farrow in {{difference.formattedValue}}&nbsp;days!'],
                                ['when' => 'currentDate == farrowing', 'text' => ' Your sow gave birth today!'],
                                ['when' => 'difference < 0', 'text' => ' Your sow gave birth {{negativeDifference.formattedValue}}&nbsp;days ago!'],
                                ['when' => 'difference == 1', 'text' => ' Your sow is going to farrow in {{difference.formattedValue}}&nbsp;day!'],
                                ['when' => 'negativeDifference == 1', 'text' => ' Your sow gave birth {{negativeDifference.formattedValue}}&nbsp;day ago!'],
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
                                ['when' => 'not((SuffixCheckJ == 1 and suffixCheckK != 11) and (SuffixCheckJ == 2 and suffixCheckK != 12) and (SuffixCheckJ == 3 and suffixCheckK != 13))', 'text' => 'Today is the {{pregnancyDay.formattedValue}}th day of the gestation.'],
                                ['when' => 'SuffixCheckJ == 1 and suffixCheckK != 11', 'text' => 'Today is the {{pregnancyDay.formattedValue}}st day of the gestation.'],
                                ['when' => 'SuffixCheckJ == 2 and suffixCheckK != 12', 'text' => 'Today is the {{pregnancyDay.formattedValue}}nd day of the gestation.'],
                                ['when' => 'SuffixCheckJ == 3 and suffixCheckK != 13', 'text' => 'Today is the {{pregnancyDay.formattedValue}}rd day of the gestation.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '• Earliest possible farrowing: {{earliestDue.formattedValue}} • Latest possible farrowing: {{latestDue.formattedValue}}'],
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
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'negativeDifference',
                            'label' => 'Negative difference',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pregnancyDay',
                            'label' => 'Pregnancy day',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'SuffixCheckJ',
                            'label' => 'Suffix check j',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'suffixCheckK',
                            'label' => 'Suffix check k',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
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
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'farrowing = exposed + 114',
            'results' => ['farrowing' => 'exposed + 114', 'exposed' => 'farrowing - 114'],
        ],
        [
            'title' => 'difference = round(farrowing - currentDate)',
            'results' => ['difference' => 'round(-currentDate + farrowing)'],
        ],
        [
            'title' => 'negativeDifference = round(difference * -1)',
            'results' => ['negativeDifference' => 'round(-round(-currentDate + farrowing))'],
        ],
        [
            'title' => 'pregnancyDay = round(currentDate - exposed)',
            'results' => ['pregnancyDay' => 'round(currentDate - exposed)'],
        ],
        [
            'title' => 'earliestDue = exposed + 112',
            'results' => ['earliestDue' => 'exposed + 112', 'exposed' => 'earliestDue - 112'],
        ],
        [
            'title' => 'latestDue = exposed + 120',
            'results' => ['latestDue' => 'exposed + 120', 'exposed' => 'latestDue - 120'],
        ],
        [
            'title' => 'SuffixCheckJ = round(mod(pregnancyDay, 10))',
            'results' => ['SuffixCheckJ' => 'round(mod(round(currentDate - exposed), 10))'],
        ],
        [
            'title' => 'suffixCheckK = round(mod(pregnancyDay, 100))',
            'results' => ['suffixCheckK' => 'round(mod(round(currentDate - exposed), 100))'],
        ],
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
            <p>Use it whenever the numbers you have are Breeding date and the number you are missing is Farrowing date and Difference.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
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
