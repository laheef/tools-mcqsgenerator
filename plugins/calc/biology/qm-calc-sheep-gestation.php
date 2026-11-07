<?php

/**
 * Sheep gestation
 * /biology/sheep-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sheep gestation',
    'meta' => ['title' => 'Sheep gestation Calculator: Units & Formula', 'description' => 'Sheep gestation works out lambing date from mating date. Nothing is stored between visits: the boxes are the only place your numbers live. No sign-up.', 'h1' => 'Sheep gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'finalLambing' => ['type' => 'date', 'rnd' => null],
            'initialLambing' => ['type' => 'date', 'rnd' => null],
            'lambing_date' => ['type' => 'date', 'rnd' => null],
            'mating_date' => ['type' => 'date', 'rnd' => null],
        ],
        'groups' => [
            [
                'uid' => 'sxJ_GOM1d0su0YcNkxLAH',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'mating_date', 'vt' => 'date', 'l' => 'Mating date '],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'lambing_date', 'vt' => 'date', 'l' => 'Lambing date '],
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
                                        [null, 'You may expect the lamb to be born between {{initialLambing.longValue}} and {{finalLambing.longValue}}.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'EvK-ryZpHEtWGrvIFuNFH',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'initialLambing', 'vt' => 'date', 'l' => ''],
                            ],
                            [
                                ['t' => 'v', 'n' => 'finalLambing', 'vt' => 'date', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'lambing_date = mating_date + 147',
                'var' => [
                    [
                        'l' => 'mating_date',
                        'f' => 'lambing_date - 147',
                        'r' => ['lambing_date'],
                    ],
                    [
                        'l' => 'lambing_date',
                        'f' => 'mating_date + 147',
                        'r' => ['mating_date'],
                    ],
                ],
            ],
            [
                'formula' => 'initialLambing = mating_date + 142',
                'var' => [
                    [
                        'l' => 'mating_date',
                        'f' => 'initialLambing - 142',
                        'r' => ['initialLambing'],
                    ],
                    [
                        'l' => 'initialLambing',
                        'f' => 'mating_date + 142',
                        'r' => ['mating_date'],
                    ],
                ],
            ],
            [
                'formula' => 'finalLambing = mating_date + 152',
                'var' => [
                    [
                        'l' => 'mating_date',
                        'f' => 'finalLambing - 152',
                        'r' => ['finalLambing'],
                    ],
                    [
                        'l' => 'finalLambing',
                        'f' => 'mating_date + 152',
                        'r' => ['mating_date'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sheep gestation takes Mating date and returns Lambing date and Final Lambing. The arithmetic is the whole method: lambing date is worked out from mating date by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Sheep gestation calculator works', 'html' => <<<'TXT'
            <p>Sheep gestation answers one question from 1 number, and the answer is Lambing date, Final Lambing and Initial Lambing.</p><p>The relationship it solves reads Lambing date = Mating date + 147.</p><p>What comes back is Lambing date, Final Lambing and Initial Lambing — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Mating date</strong> — a plain number, no unit, entered as a date</li></ul><p>The answers come back as Lambing date, Final Lambing, Initial Lambing. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Mating date = Sun 1 March 2026 gives <strong>Lambing date</strong> = Sun 26 July 2026, <strong>Initial Lambing</strong> = Tue 21 July 2026 and <strong>Final Lambing</strong> = Fri 31 July 2026.</p><ul><li><strong>Lambing date</strong> = Sun 26 July 2026</li><li><strong>Initial Lambing</strong> = Tue 21 July 2026</li><li><strong>Final Lambing</strong> = Fri 31 July 2026</li></ul><p>The line behind those figures is <strong>Lambing date</strong> = <code>Mating date + 147</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Lambing date</strong> = Sun 26 July 2026, <strong>Initial Lambing</strong> = Tue 21 July 2026 and <strong>Final Lambing</strong> = Fri 31 July 2026 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Lambing date takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Lambing date</strong> = <code>Mating date + 147</code></li><li><strong>Mating date</strong> = <code>Lambing date − 147</code></li><li><strong>Initial Lambing</strong> = <code>Mating date + 142</code></li><li><strong>Final Lambing</strong> = <code>Mating date + 152</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Lambing date</strong> = <code>Mating date + 147</code> — the form to use when Mating date are the values you have.</li><li><strong>Mating date</strong> = <code>Lambing date − 147</code> — the form to use when Lambing date are the values you have.</li><li><strong>Initial Lambing</strong> = <code>Mating date + 142</code> — the form to use when Mating date are the values you have.</li><li><strong>Mating date</strong> = <code>Initial Lambing − 142</code> — the form to use when Initial Lambing are the values you have.</li><li><strong>Final Lambing</strong> = <code>Mating date + 152</code> — the form to use when Mating date are the values you have.</li><li><strong>Mating date</strong> = <code>Final Lambing − 152</code> — the form to use when Final Lambing are the values you have.</li></ul><p>Any one of Lambing date, Mating date and Initial Lambing can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Mating date, from Sun 1 March 2026 to Wed 29 April 2082 — and the answers go from <strong>Lambing date</strong> Sun 26 July 2026, <strong>Initial Lambing</strong> Tue 21 July 2026 and <strong>Final Lambing</strong> Fri 31 July 2026 to <strong>Lambing date</strong> Wed 23 September 2082, <strong>Initial Lambing</strong> Fri 18 September 2082 and <strong>Final Lambing</strong> Mon 28 September 2082.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Lambing date, Final Lambing and Initial Lambing are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Mating date left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Mating date is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Mating date and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sheep gestation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Mating date</strong> takes a plain number with no unit attached. The page reads it when it works out Lambing date, Initial Lambing and Final Lambing. Fill it from a measurement rather than a memory — Mating date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Lambing date</strong> is a plain number and the page's own defaults put it at Sun 26 July 2026. The value follows from Mating date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Final Lambing</strong> is a plain number and the page's own defaults put it at Fri 31 July 2026. The value follows from Mating date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Initial Lambing</strong> is a plain number and the page's own defaults put it at Tue 21 July 2026. The value follows from Mating date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Lambing date</th><th>Initial Lambing</th><th>Final Lambing</th></tr></thead><tbody><tr><td><strong>Mating date</strong> +10%</td><td>+9.93%</td><td>+9.93%</td><td>+9.93%</td></tr></tbody></table><p>Ranked by leverage, Mating date sits at the top — a ten per cent error in that box shows up as roughly 9.9 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Mating date = Fri 30 January 1998 and the page reports <strong>Lambing date</strong> = Fri 26 June 1998, <strong>Initial Lambing</strong> = Sun 21 June 1998 and <strong>Final Lambing</strong> = Wed 1 July 1998.</li><li>Feed in Mating date = Sat 28 June 2138 and the page reports <strong>Lambing date</strong> = Sat 22 November 2138, <strong>Initial Lambing</strong> = Mon 17 November 2138 and <strong>Final Lambing</strong> = Thu 27 November 2138.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Mating date ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Mating date — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Lambing date against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Lambing date follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Mating date is what you already know and Lambing date and Final Lambing is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dna-concentration">DNA concentration</a>, <a href="/biology/dna-copy-number">DNA copy number Calculator</a> and <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Sheep gestation is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Mating date beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sheep gestation calculator work out?', 'a' => 'Lambing date, Final Lambing and Initial Lambing, from Mating date. The relationship is Lambing date = Mating date + 147.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mating date. Enter mating date; Lambing date is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Lambing date, Mating date, Initial Lambing and Final Lambing blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Lambing date = Sun 26 July 2026, Initial Lambing = Tue 21 July 2026 and Final Lambing = Fri 31 July 2026. The figures come from Mating date as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Lambing date is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mating date blank and the page solves for it, reporting Lambing date instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Lambing date keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dna-concentration', 'name' => 'DNA concentration'],
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number Calculator'],
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
        ],
        'authors' => [],
    ],
];
