<?php

/**
 * Daily light integral (DLI)
 * /biology/daily-light-integral-dli
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Daily light integral (DLI)',
    'meta' => ['title' => 'Daily light integral Calculator: Steps & Units', 'description' => 'Enter light hours per day and Photon flux density (PPFD) and get Daily light integral (DLI) back. Free to use, with the working shown beside the answer.', 'h1' => 'Daily light integral (DLI) Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'dli' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'lfd' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppfd' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'Pl2Pl12psJ7L2MbfKFzR9',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'lfd',
                                    'vt' => 'numerical',
                                    'l' => 'Light hours per day ',
                                    'us' => '19',
                                    'du' => 'hrs',
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
                                    'n' => 'ppfd',
                                    'vt' => 'numerical',
                                    'l' => 'Photon flux density (PPFD)',
                                    'suf' => 'μmol/s·m²',
                                    'h' => 'PPFD is photosynthetic photon flux density.',
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
                                    'n' => 'dli',
                                    'vt' => 'numerical',
                                    'l' => 'Daily light integral (DLI)',
                                    'suf' => 'mol/m²/day',
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
                                        ['dli > 0 and dli <= 6', 'This amount of light is the minimum requirement for microgreens.'],
                                        ['dli > 6 and dli <= 12', 'This amount of light is good for microgreens.'],
                                        ['dli > 12 and dli <= 17', 'This amount of light is good for vegetative plants like leafy greens and herbs.'],
                                        ['dli > 17 and dli < 40', 'This amount of light is good for flowering crops, including vegetables that grow out of flowers, like peppers and tomatoes.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'dli = ppfd * lfd * 3600 / 1000000',
                'var' => [
                    [
                        'l' => 'lfd',
                        'f' => '(2500/9)*dli/ppfd',
                        'r' => ['dli', 'ppfd'],
                    ],
                    [
                        'l' => 'dli',
                        'f' => '(9/2500)*lfd*ppfd',
                        'r' => ['lfd', 'ppfd'],
                    ],
                    [
                        'l' => 'ppfd',
                        'f' => '(2500/9)*dli/lfd',
                        'r' => ['lfd', 'dli'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Daily light integral (DLI) turns Light hours per day and Photon flux density (PPFD) into Daily light integral (DLI). The arithmetic is the whole method: daily light integral (DLI) is worked out from light hours per day by one formula, applied once. Daily light integral (DLI) comes back in mol/m²/day unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Daily light integral (DLI) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Daily light integral (DLI): it takes 2 numbers and reports Daily light integral (DLI).</p><p>Written with the labels from the form, Daily light integral (DLI) = (9 ÷ 2500) × Light hours per day × Photon flux density (PPFD).</p><p>The answers are Daily light integral (DLI); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Light hours per day</strong> — in hours</li><li><strong>Photon flux density (PPFD)</strong> — in μmol/s·m². PPFD is photosynthetic photon flux density.</li></ul><p>The answer comes back as Daily light integral (DLI) in mol/m²/day. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Light hours per day = 10 hrs and Photon flux density (PPFD) = 100 μmol/s·m² gives <strong>Daily light integral (DLI)</strong> = 3.6 mol/m²/day.</p><ul><li><strong>Daily light integral (DLI)</strong> = 3.6 mol/m²/day</li></ul><p>That is <strong>Daily light integral (DLI)</strong> = <code>(9 ÷ 2500) × Light hours per day × Photon flux density (PPFD)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Daily light integral (DLI)</strong> = 3.6 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Light hours per day offers 8 units and opens on hours, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Daily light integral (DLI)</strong> = <code>(9 ÷ 2500) × Light hours per day × Photon flux density (PPFD)</code></li><li><strong>Light hours per day</strong> = <code>(2500 ÷ 9) × Daily light integral (DLI) ÷ Photon flux density (PPFD)</code></li><li><strong>Photon flux density (PPFD)</strong> = <code>(2500 ÷ 9) × Daily light integral (DLI) ÷ Light hours per day</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Daily light integral (DLI)</strong> = <code>(9 ÷ 2500) × Light hours per day × Photon flux density (PPFD)</code> — the form to use when Light hours per day and Photon flux density (PPFD) are the values you have.</li><li><strong>Light hours per day</strong> = <code>(2500 ÷ 9) × Daily light integral (DLI) ÷ Photon flux density (PPFD)</code> — the form to use when Daily light integral (DLI) and Photon flux density (PPFD) are the values you have.</li><li><strong>Photon flux density (PPFD)</strong> = <code>(2500 ÷ 9) × Daily light integral (DLI) ÷ Light hours per day</code> — the form to use when Light hours per day and Daily light integral (DLI) are the values you have.</li></ul><p>Any one of Daily light integral (DLI), Light hours per day and Photon flux density (PPFD) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Light hours per day, from 10 to 20 — and the answers go from <strong>Daily light integral (DLI)</strong> 3.6 mol/m²/day to <strong>Daily light integral (DLI)</strong> 7.2 mol/m²/day.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Light hours per day is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Daily light integral (DLI) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Light hours per day left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Light hours per day is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Photon flux density (PPFD) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Photon flux density (PPFD) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Light hours per day to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Daily light integral (DLI) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Light hours per day</strong> is a hours quantity: the page opens it in hrs and converts anything else you pick before the formula runs. The page reads it when it works out Daily light integral (DLI) and Photon flux density (PPFD). Fill it from a measurement rather than a memory — Light hours per day is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Photon flux density (PPFD)</strong> is measured in μmol/s·m². PPFD is photosynthetic photon flux density. The page reads it when it works out Light hours per day and Daily light integral (DLI). Fill it from a measurement rather than a memory — Photon flux density (PPFD) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Daily light integral (DLI)</strong> is a plain number and the page's own defaults put it at 3.6. The value follows from Light hours per day and Photon flux density (PPFD). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Daily light integral (DLI)</th></tr></thead><tbody><tr><td><strong>Light hours per day</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Photon flux density (PPFD)</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Photon flux density (PPFD) sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Light hours per day = 5 hrs and Photon flux density (PPFD) = 50 μmol/s·m² and the page reports <strong>Daily light integral (DLI)</strong> = 0.9 mol/m²/day.</li><li>Feed in Light hours per day = 30 hrs and Photon flux density (PPFD) = 100 μmol/s·m² and the page reports <strong>Daily light integral (DLI)</strong> = 10.8 mol/m²/day.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Daily light integral (DLI) actually offers.</p><ul><li><strong>hours</strong> — opens in <em>hrs</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Daily light integral (DLI) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are hours and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Light hours per day and Photon flux density (PPFD) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Light hours per day and Photon flux density (PPFD) and the number you are missing is Daily light integral (DLI).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dsdna-ug-to-pmol">dsDNA µg to pmol Calculator</a>, <a href="/biology/dsdna-ug-to-pmol-converter">dsDNA µg to pmol Converter Calculator</a> and <a href="/biology/egg-incubation-hatch-date">Egg Incubation Hatch Date Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Daily light integral (DLI) calculator work out?', 'a' => <<<'TXT'
            Daily light integral (DLI), from Light hours per day and Photon flux density (PPFD). The relationship is Daily light integral (DLI) = (9 ÷ 2500) × Light hours per day × Photon flux density (PPFD).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Light hours per day (hours), Photon flux density (PPFD) (μmol/s·m²). Fill light hours per day and photon flux density (PPFD) and leave Daily light integral (DLI) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Daily light integral (DLI), Light hours per day and Photon flux density (PPFD) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Daily light integral (DLI) = 3.6 mol/m²/day. Those are the defaults written into the form — move Light hours per day and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Daily light integral (DLI) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Light hours per day blank and the page solves for it, reporting Daily light integral (DLI) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Daily light integral (DLI) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dsdna-ug-to-pmol', 'name' => 'dsDNA µg to pmol Calculator'],
            ['path' => '/biology/dsdna-ug-to-pmol-converter', 'name' => 'dsDNA µg to pmol Converter Calculator'],
            ['path' => '/biology/egg-incubation-hatch-date', 'name' => 'Egg Incubation Hatch Date Calculator'],
        ],
        'authors' => [],
    ],
];
