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
    'meta' => ['title' => 'Swine gestation — Formula, Steps & Examples', 'description' => 'Swine gestation turns breeding date into farrowing date. Every figure is computed. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Swine gestation Calculator', 'updated' => '2026-08-06'],
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
                                        ['difference > 0', '🐖 Your sow is going to farrow in {{difference.formattedValue}}&nbsp;days!'],
                                        ['currentDate == farrowing', '🐖 Your sow gave birth today!'],
                                        ['difference < 0', '🐖 Your sow gave birth {{negativeDifference.formattedValue}}&nbsp;days ago!'],
                                        ['difference == 1', '🐖 Your sow is going to farrow in {{difference.formattedValue}}&nbsp;day!'],
                                        ['negativeDifference == 1', '🐖 Your sow gave birth {{negativeDifference.formattedValue}}&nbsp;day ago!'],
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
        Swine gestation takes Breeding date and returns Farrowing date. Nothing is looked up on this page: farrowing date is computed from breeding date and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Swine gestation calculator works', 'html' => <<<'TXT'
            <p>Swine gestation answers one question from 1 number, and the answer is Farrowing date.</p><p>Written with the labels from the form, Farrowing date = Breeding date + 114.</p><p>The result panel carries Farrowing date, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Breeding date</strong> — a plain number, no unit, entered as a date</li></ul><p>What you get back is Farrowing date, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Breeding date = 1.772e+12; the answers are <strong>Farrowing date</strong> = 1.782e+12.</p><ul><li><strong>Farrowing date</strong> = 1.782e+12</li></ul><p>The line behind those figures is <strong>Farrowing date</strong> = <code>Breeding date + 114</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Farrowing date</strong> = 1.782e+12 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Farrowing date takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Farrowing date</strong> = <code>Breeding date + 114</code></li><li><strong>Breeding date</strong> = <code>Farrowing date − 114</code></li><li><strong>difference</strong> = <code>round( − currentDate + Farrowing date)</code></li><li><strong>negativeDifference</strong> = <code>round( − round( − currentDate + Farrowing date))</code></li><li><strong>pregnancyDay</strong> = <code>round(currentDate − Breeding date)</code></li><li><strong>earliestDue</strong> = <code>Breeding date + 112</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Farrowing date</strong> = <code>Breeding date + 114</code> — the form to use when Breeding date are the values you have.</li><li><strong>Breeding date</strong> = <code>Farrowing date − 114</code> — the form to use when Farrowing date are the values you have.</li><li><strong>difference</strong> = <code>round( − currentDate + Farrowing date)</code> — the form to use when Farrowing date are the values you have.</li><li><strong>negativeDifference</strong> = <code>round( − round( − currentDate + Farrowing date))</code> — the form to use when Farrowing date are the values you have.</li><li><strong>pregnancyDay</strong> = <code>round(currentDate − Breeding date)</code> — the form to use when Breeding date are the values you have.</li><li><strong>earliestDue</strong> = <code>Breeding date + 112</code> — the form to use when Breeding date are the values you have.</li><li><strong>Breeding date</strong> = <code>earliestDue − 112</code> — the form to use when the other values are known.</li><li><strong>latestDue</strong> = <code>Breeding date + 120</code> — the form to use when Breeding date are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Farrowing date, Breeding date and difference can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Breeding date, from 1.772e+12 to 3.545e+12 — and the answers go from <strong>Farrowing date</strong> 1.782e+12 to <strong>Farrowing date</strong> 3.554e+12.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Farrowing date is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Breeding date left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Breeding date is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Breeding date and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Swine gestation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Breeding date</strong> takes a plain number with no unit attached. It feeds Farrowing date. Fill it from a measurement rather than a memory — Breeding date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Farrowing date</strong> is a plain number and the page's own defaults put it at 1.782e+12. It is computed from Breeding date, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Farrowing date</th></tr></thead><tbody><tr><td><strong>Breeding date</strong> +10%</td><td>+9.94%</td></tr></tbody></table><p>Ranked by leverage, Breeding date sits at the top — a ten per cent error in that box shows up as roughly 9.9 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Breeding date = 8.862e+11 and the page reports <strong>Farrowing date</strong> = 8.960e+11, <strong>earliestDue</strong> = 8.958e+11 and <strong>latestDue</strong> = 8.965e+11.</li><li>Feed in Breeding date = 5.317e+12 and the page reports <strong>Farrowing date</strong> = 5.327e+12, <strong>earliestDue</strong> = 5.327e+12 and <strong>latestDue</strong> = 5.327e+12.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Breeding date ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Breeding date — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Farrowing date against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Farrowing date follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Breeding date and the number you are missing is Farrowing date.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cell-dilution">Cell dilution Calculator</a>, <a href="/biology/cell-doubling-time">Cell doubling time Calculator</a> and <a href="/biology/cell-seeding-density">Cell Seeding Density Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Swine gestation is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Swine gestation is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Breeding date beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Swine gestation calculator work out?', 'a' => 'Farrowing date, from Breeding date. The relationship is Farrowing date = Breeding date + 114.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Breeding date. Enter breeding date; Farrowing date is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Farrowing date, Breeding date, difference and negativeDifference can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Farrowing date = 1.782e+12. Those are the defaults written into the form — move Breeding date and every result box follows.'],
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
