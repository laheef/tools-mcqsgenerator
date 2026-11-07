<?php

/**
 * Rabbit gestation
 * /biology/rabbit-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rabbit gestation',
    'meta' => ['title' => 'Rabbit gestation — Formula, Steps & Examples', 'description' => 'Rabbit gestation works out palpate rabbit from rabbit Type and conception date. Leave conception date empty and the page will solve for it instead. Free.', 'h1' => 'Rabbit gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'estimatedDateOfConception' => ['type' => 'date', 'rnd' => null],
            'expectedBirthDate' => ['type' => 'date', 'rnd' => null],
            'nestBox' => ['type' => 'date', 'rnd' => null],
            'palpateTheRabbit' => ['type' => 'date', 'rnd' => null],
            'typeOfRabbit' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'R0gLTk8hjProB_JPGWN9j', 'c' => null],
                ],
                'ds' => '7tz9GkYgmRCjsSeP-8irZ',
            ],
        ],
        'groups' => [
            [
                'uid' => 'gPWsjlhfCRfTh1ZA3ED8N',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'typeOfRabbit',
                                    'vt' => 'valueSelect',
                                    'l' => 'Rabbit Type',
                                    'ds' => '7tz9GkYgmRCjsSeP-8irZ',
                                    'opts' => [
                                        ['95ctlj1tmNtyxbQjHS4qC', 'Desert Cottontail & New England Cottontail', '28'],
                                        ['S9hprgzAQC09-ui6vywgh', 'European Rabbit, Flemish Giant, Chinchilla', '28.000000000000000001'],
                                        ['3NRt1YiM8XP8d-uQSX-oc', 'New Zealand White, French Lop', '28.000000000000001'],
                                        ['nFiTmb-_t09-VNaSFe-91', 'Harlequin Rabbit', '29'],
                                        ['_4JvKYyUqs7bzgChsR4kU', 'California white, American Rabbit', '31'],
                                        ['xN6qq9QPKOOO1BHXSgnP-', 'Blanc de Hotot, Belgian Hare Rabbit', '30'],
                                        ['l1bxpPBE4wKCH39TcwD81', 'Mexican Cottontail & Dice, Dwarf Rabbits', '30.0000000000000001'],
                                        ['R0gLTk8hjProB_JPGWN9j', 'Tapeti', '42'],
                                        ['Jf9RMVDoIdObb3rWc6mmQ', 'Swamp rabbit, Eastern Cottontail & Brush rabbits', '27'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'estimatedDateOfConception', 'vt' => 'date', 'l' => 'Conception date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'palpateTheRabbit',
                                    'vt' => 'date',
                                    'l' => 'Palpate rabbit',
                                    'h' => 'This is the best day to palpate the rabbit (check for baby rabbits). However, this may be done as early as the 11th day and no later than the 14th day.',
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
                                    'n' => 'nestBox',
                                    'vt' => 'date',
                                    'l' => 'Nest box',
                                    'h' => 'This is the best day to add the nest box. Try not to add this too early, to avoid a mess. It is best to add this 2 days before the expected birth date.',
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
                                    'n' => 'expectedBirthDate',
                                    'vt' => 'date',
                                    'l' => 'Birth date',
                                    'h' => 'The birth should occur no later than two days after the date shown here or there is a good chance of a stillbirth.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'estimatedDateOfConception + typeOfRabbit=expectedBirthDate',
                'var' => [
                    [
                        'l' => 'typeOfRabbit',
                        'f' => '-estimatedDateOfConception + expectedBirthDate',
                        'r' => ['estimatedDateOfConception', 'expectedBirthDate'],
                    ],
                    [
                        'l' => 'estimatedDateOfConception',
                        'f' => 'expectedBirthDate - typeOfRabbit',
                        'r' => ['typeOfRabbit', 'expectedBirthDate'],
                    ],
                    [
                        'l' => 'expectedBirthDate',
                        'f' => 'estimatedDateOfConception + typeOfRabbit',
                        'r' => ['typeOfRabbit', 'estimatedDateOfConception'],
                    ],
                ],
            ],
            [
                'formula' => 'estimatedDateOfConception + 12=palpateTheRabbit',
                'var' => [
                    [
                        'l' => 'palpateTheRabbit',
                        'f' => 'estimatedDateOfConception + 12',
                        'r' => ['estimatedDateOfConception'],
                    ],
                    [
                        'l' => 'estimatedDateOfConception',
                        'f' => 'palpateTheRabbit - 12',
                        'r' => ['palpateTheRabbit'],
                    ],
                ],
            ],
            [
                'formula' => 'expectedBirthDate - 2 =nestBox',
                'var' => [
                    [
                        'l' => 'nestBox',
                        'f' => 'expectedBirthDate - 2',
                        'r' => ['expectedBirthDate'],
                    ],
                    [
                        'l' => 'expectedBirthDate',
                        'f' => 'nestBox + 2',
                        'r' => ['nestBox'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '7tz9GkYgmRCjsSeP-8irZ' => [
                'name' => 'Type of Rabbit',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => '95ctlj1tmNtyxbQjHS4qC', 'label' => 'Desert Cottontail & New England Cottontail', 'value' => '28'],
                    ['uid' => 'S9hprgzAQC09-ui6vywgh', 'label' => 'European Rabbit, Flemish Giant, Chinchilla', 'value' => '28.000000000000000001'],
                    ['uid' => '3NRt1YiM8XP8d-uQSX-oc', 'label' => 'New Zealand White, French Lop', 'value' => '28.000000000000001'],
                    ['uid' => 'nFiTmb-_t09-VNaSFe-91', 'label' => 'Harlequin Rabbit', 'value' => '29'],
                    ['uid' => '_4JvKYyUqs7bzgChsR4kU', 'label' => 'California white, American Rabbit', 'value' => '31'],
                    ['uid' => 'xN6qq9QPKOOO1BHXSgnP-', 'label' => 'Blanc de Hotot, Belgian Hare Rabbit', 'value' => '30'],
                    ['uid' => 'l1bxpPBE4wKCH39TcwD81', 'label' => 'Mexican Cottontail & Dice, Dwarf Rabbits', 'value' => '30.0000000000000001'],
                    ['uid' => 'R0gLTk8hjProB_JPGWN9j', 'label' => 'Tapeti', 'value' => '42'],
                    ['uid' => 'Jf9RMVDoIdObb3rWc6mmQ', 'label' => 'Swamp rabbit, Eastern Cottontail & Brush rabbits', 'value' => '27'],
                ],
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Conception date and Birth date into Rabbit gestation and the answer comes back as Rabbit Type and Palpate rabbit. There is no hidden constant here: change rabbit Type and conception date moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Rabbit gestation calculator works', 'html' => <<<'TXT'
            <p>Rabbit gestation answers one question from 2 numbers, and the answer is Rabbit Type, Palpate rabbit and Nest box.</p><p>Written with the labels from the form, Rabbit Type = − Conception date + Birth date.</p><p>What comes back is Rabbit Type, Palpate rabbit and Nest box — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Conception date</strong> — a plain number, no unit, entered as a date</li><li><strong>Birth date</strong> — a plain number, no unit, entered as a date. The birth should occur no later than two days after the date shown here or there is a good chance of a stillbirth.</li></ul><p>The result boxes are Rabbit Type, Palpate rabbit, Nest box; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Conception date = Sun 1 March 2026 and Birth date = Sun 1 March 2026 gives <strong>Rabbit Type</strong> = 42, <strong>Palpate rabbit</strong> = Fri 13 March 2026 and <strong>Nest box</strong> = Fri 27 February 2026.</p><ul><li><strong>Rabbit Type</strong> = 42</li><li><strong>Palpate rabbit</strong> = Fri 13 March 2026</li><li><strong>Nest box</strong> = Fri 27 February 2026</li></ul><p>That is <strong>Rabbit Type</strong> = <code>− Conception date + Birth date</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Rabbit Type</strong> = 42, <strong>Palpate rabbit</strong> = Fri 13 March 2026 and <strong>Nest box</strong> = Fri 27 February 2026. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Rabbit Type is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Rabbit Type</strong> = <code>− Conception date + Birth date</code></li><li><strong>Conception date</strong> = <code>Birth date − Rabbit Type</code></li><li><strong>Birth date</strong> = <code>Conception date + Rabbit Type</code></li><li><strong>Palpate rabbit</strong> = <code>Conception date + 12</code></li><li><strong>Nest box</strong> = <code>Birth date − 2</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Rabbit Type</strong> = <code>− Conception date + Birth date</code> — the form to use when Conception date and Birth date are the values you have.</li><li><strong>Conception date</strong> = <code>Birth date − Rabbit Type</code> — the form to use when Rabbit Type and Birth date are the values you have.</li><li><strong>Birth date</strong> = <code>Conception date + Rabbit Type</code> — the form to use when Rabbit Type and Conception date are the values you have.</li><li><strong>Palpate rabbit</strong> = <code>Conception date + 12</code> — the form to use when Conception date are the values you have.</li><li><strong>Conception date</strong> = <code>Palpate rabbit − 12</code> — the form to use when Palpate rabbit are the values you have.</li><li><strong>Nest box</strong> = <code>Birth date − 2</code> — the form to use when Birth date are the values you have.</li><li><strong>Birth date</strong> = <code>Nest box + 2</code> — the form to use when Nest box are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Rabbit Type, Conception date and Birth date can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Conception date from Sun 1 March 2026 to Wed 29 April 2082, leaving every other box alone. The panel moves from <strong>Rabbit Type</strong> 42, <strong>Palpate rabbit</strong> Fri 13 March 2026 and <strong>Nest box</strong> Fri 27 February 2026 to <strong>Rabbit Type</strong> 42, <strong>Palpate rabbit</strong> Mon 11 May 2082 and <strong>Nest box</strong> Fri 27 February 2026.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Rabbit Type, Palpate rabbit and Nest box are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Conception date left as a guess.</strong> Anything typed into Conception date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Birth date left as a guess.</strong> Anything typed into Birth date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Conception date is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Rabbit gestation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Conception date</strong> takes a plain number with no unit attached. It feeds Rabbit Type, Birth date and Palpate rabbit. Fill it from a measurement rather than a memory — Conception date is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Birth date</strong> takes a plain number with no unit attached. The birth should occur no later than two days after the date shown here or there is a good chance of a stillbirth. It feeds Rabbit Type, Conception date and Nest box. Fill it from a measurement rather than a memory — Birth date is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Rabbit Type</strong> is a plain number and the page's own defaults put it at 42. It is worked out from Conception date and Birth date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Palpate rabbit</strong> is a plain number and the page's own defaults put it at Fri 13 March 2026. It is worked out from Conception date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Nest box</strong> is a plain number and the page's own defaults put it at Fri 27 February 2026. It is worked out from Birth date. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Rabbit Type</th><th>Palpate rabbit</th><th>Nest box</th></tr></thead><tbody><tr><td><strong>Conception date</strong> +10%</td><td>+0%</td><td>+9.99%</td><td>+0%</td></tr><tr><td><strong>Birth date</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Birth date: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Conception date = Fri 30 January 1998 and Birth date = Fri 30 January 1998 and the page reports <strong>Rabbit Type</strong> = 42, <strong>Palpate rabbit</strong> = Wed 11 February 1998 and <strong>Nest box</strong> = Wed 28 January 1998.</li><li>Feed in Conception date = Sat 28 June 2138 and Birth date = Sun 1 March 2026 and the page reports <strong>Rabbit Type</strong> = 42, <strong>Palpate rabbit</strong> = Thu 10 July 2138 and <strong>Nest box</strong> = Fri 27 February 2026.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Rabbit Type is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Conception date and Birth date are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Conception date and Birth date and the number you are missing is Rabbit Type and Palpate rabbit.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Rabbit gestation is a number to act on, so the useful question is what to do with Rabbit Type, Palpate rabbit and Nest box once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Conception date and Birth date alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rabbit gestation calculator work out?', 'a' => 'Rabbit Type, Palpate rabbit and Nest box, from Conception date and Birth date. The relationship is Rabbit Type = − Conception date + Birth date.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Conception date, Birth date. Enter conception date and birth date; Rabbit Type is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Rabbit Type, Conception date, Birth date and Palpate rabbit can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Rabbit Type = 42, Palpate rabbit = Fri 13 March 2026 and Nest box = Fri 27 February 2026. Those are the defaults written into the form — move Conception date and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Rabbit Type is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Conception date blank and the page solves for it, reporting Rabbit Type instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Rabbit Type keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/fertilizer', 'name' => 'Fertilizer Calculator'],
            ['path' => '/biology/fertilizer-injector-ratio', 'name' => 'Fertilizer Injector Ratio Calculator'],
            ['path' => '/biology/plant-available-water', 'name' => 'Field Capacity and Plant Available Water Calculator'],
        ],
        'authors' => [],
    ],
];
