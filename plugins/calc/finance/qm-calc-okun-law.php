<?php

/**
 * Okun's law
 * /finance/okun-law
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Okun\'s law',
    'meta' => ['title' => 'Okun\'s law Calculator — Formula, Units & Example', 'description' => 'Okun\'s law turns unemployment rate (U), Natural rate of unemployment (U*) and okun coefficient (β) into output gap (Okun gap, Ỹ). A worked example follows.', 'h1' => 'Okun\'s law Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => 'Labor market',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'u',
                            'label' => 'Unemployment rate (U)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'uPrev',
                            'label' => 'Natural rate of unemployment (U*)',
                            'type' => 'number',
                            'help' => 'The long-run level of unemployment.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'b',
                            'label' => 'Okun coefficient (β)',
                            'type' => 'number',
                            'help' => 'This represents the fractions on the labor market (labor hoarding and changes in the labor force).',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '-0.45',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Output',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'y',
                            'label' => 'Actual GDP growth rate (Y)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yTrend',
                            'label' => 'Trend growth rate (Y*)',
                            'type' => 'number',
                            'help' => 'The long-run GDP growth rate corresponding to the potential output.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yGap',
                            'label' => 'Output gap (Okun gap, Ỹ)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'yGap = (u - uPrev) / b',
            'results' => ['u' => 'b*yGap + uPrev', 'uPrev' => '-b*yGap + u', 'yGap' => '(u - uPrev)/b', 'b' => '(u - uPrev)/yGap'],
        ],
        [
            'title' => 'b * (y - yTrend) = u - uPrev',
            'results' => [
                'y' => '(b*yTrend + u - uPrev)/b',
                'b' => '(u - uPrev)/(y - yTrend)',
                'u' => 'b*y - b*yTrend + uPrev',
                'yTrend' => '(b*y - u + uPrev)/b',
                'uPrev' => '-b*y + b*yTrend + u',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Okun's law works out Actual GDP growth rate (Y) and Trend growth rate (Y*) from Unemployment rate (U), Natural rate of unemployment (U*) and Okun coefficient (β). The arithmetic is the whole method: actual GDP growth rate (Y) is worked out from unemployment rate (U) by one formula, applied once. Actual GDP growth rate (Y) comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Okun\'s law calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Okun&#039;s law: it takes 3 numbers and reports Actual GDP growth rate (Y), Trend growth rate (Y*) and Output gap (Okun gap, Ỹ).</p><p>The relationship it solves reads Output gap (Okun gap, Ỹ) = (Unemployment rate (U) − Natural rate of unemployment (U*)) ÷ Okun coefficient (β).</p><p>The result panel carries Actual GDP growth rate (Y), Trend growth rate (Y*) and Output gap (Okun gap, Ỹ), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Unemployment rate (U)</strong> — in percent</li><li><strong>Natural rate of unemployment (U*)</strong> — in percent. The long-run level of unemployment.</li><li><strong>Okun coefficient (β)</strong> — a plain number, no unit. This represents the fractions on the labor market (labor hoarding and changes in the labor force).</li></ul><p>What you get back is Actual GDP growth rate (Y) in percent, Trend growth rate (Y*) in percent, Output gap (Okun gap, Ỹ) in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Unemployment rate (U) = 10 perc, Natural rate of unemployment (U*) = 100 perc, Okun coefficient (β) = 1000, Actual GDP growth rate (Y) = 10 perc and Trend growth rate (Y*) = 100 perc — through the same formula and the panel reports <strong>Output gap (Okun gap, Ỹ)</strong> = -0.09 perc.</p><ul><li><strong>Output gap (Okun gap, Ỹ)</strong> = -0.09 perc</li></ul><p>That is <strong>Output gap (Okun gap, Ỹ)</strong> = <code>(Unemployment rate (U) − Natural rate of unemployment (U*)) ÷ Okun coefficient (β)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Output gap (Okun gap, Ỹ)</strong> = -0.09. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Actual GDP growth rate (Y) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Output gap (Okun gap, Ỹ)</strong> = <code>(Unemployment rate (U) − Natural rate of unemployment (U*)) ÷ Okun coefficient (β)</code></li><li><strong>Unemployment rate (U)</strong> = <code>Okun coefficient (β) × Output gap (Okun gap, Ỹ) + Natural rate of unemployment (U*)</code></li><li><strong>Natural rate of unemployment (U*)</strong> = <code>− Okun coefficient (β) × Output gap (Okun gap, Ỹ) + Unemployment rate (U)</code></li><li><strong>Okun coefficient (β)</strong> = <code>(Unemployment rate (U) − Natural rate of unemployment (U*)) ÷ Output gap (Okun gap, Ỹ)</code></li><li><strong>Actual GDP growth rate (Y)</strong> = <code>(Okun coefficient (β) × Trend growth rate (Y*) + Unemployment rate (U) − Natural rate of unemployment (U*)) ÷ Okun coefficient (β)</code></li><li><strong>Trend growth rate (Y*)</strong> = <code>(Okun coefficient (β) × Actual GDP growth rate (Y) − Unemployment rate (U) + Natural rate of unemployment (U*)) ÷ Okun coefficient (β)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Output gap (Okun gap, Ỹ)</strong> = <code>(Unemployment rate (U) − Natural rate of unemployment (U*)) ÷ Okun coefficient (β)</code> — the form to use when Unemployment rate (U), Natural rate of unemployment (U*) and Okun coefficient (β) are the values you have.</li><li><strong>Unemployment rate (U)</strong> = <code>Okun coefficient (β) × Output gap (Okun gap, Ỹ) + Natural rate of unemployment (U*)</code> — the form to use when Okun coefficient (β), Output gap (Okun gap, Ỹ) and Natural rate of unemployment (U*) are the values you have.</li><li><strong>Natural rate of unemployment (U*)</strong> = <code>− Okun coefficient (β) × Output gap (Okun gap, Ỹ) + Unemployment rate (U)</code> — the form to use when Okun coefficient (β), Output gap (Okun gap, Ỹ) and Unemployment rate (U) are the values you have.</li><li><strong>Okun coefficient (β)</strong> = <code>(Unemployment rate (U) − Natural rate of unemployment (U*)) ÷ Output gap (Okun gap, Ỹ)</code> — the form to use when Unemployment rate (U), Natural rate of unemployment (U*) and Output gap (Okun gap, Ỹ) are the values you have.</li><li><strong>Actual GDP growth rate (Y)</strong> = <code>(Okun coefficient (β) × Trend growth rate (Y*) + Unemployment rate (U) − Natural rate of unemployment (U*)) ÷ Okun coefficient (β)</code> — the form to use when Okun coefficient (β), Trend growth rate (Y*), Unemployment rate (U) and Natural rate of unemployment (U*) are the values you have.</li><li><strong>Okun coefficient (β)</strong> = <code>(Unemployment rate (U) − Natural rate of unemployment (U*)) ÷ (Actual GDP growth rate (Y) − Trend growth rate (Y*))</code> — the form to use when Unemployment rate (U), Natural rate of unemployment (U*), Actual GDP growth rate (Y) and Trend growth rate (Y*) are the values you have.</li><li><strong>Unemployment rate (U)</strong> = <code>Okun coefficient (β) × Actual GDP growth rate (Y) − Okun coefficient (β) × Trend growth rate (Y*) + Natural rate of unemployment (U*)</code> — the form to use when Okun coefficient (β), Actual GDP growth rate (Y), Trend growth rate (Y*) and Natural rate of unemployment (U*) are the values you have.</li><li><strong>Trend growth rate (Y*)</strong> = <code>(Okun coefficient (β) × Actual GDP growth rate (Y) − Unemployment rate (U) + Natural rate of unemployment (U*)) ÷ Okun coefficient (β)</code> — the form to use when Okun coefficient (β), Actual GDP growth rate (Y), Unemployment rate (U) and Natural rate of unemployment (U*) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Output gap (Okun gap, Ỹ), Unemployment rate (U) and Natural rate of unemployment (U*) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Unemployment rate (U), from 10 to 20 — and the answers go from <strong>Output gap (Okun gap, Ỹ)</strong> -0.09 perc to <strong>Output gap (Okun gap, Ỹ)</strong> -0.08 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Unemployment rate (U) and Natural rate of unemployment (U*) carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Actual GDP growth rate (Y), Trend growth rate (Y*) and Output gap (Okun gap, Ỹ) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Unemployment rate (U) left as a guess.</strong> Anything typed into Unemployment rate (U) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Natural rate of unemployment (U*) left as a guess.</strong> Anything typed into Natural rate of unemployment (U*) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Unemployment rate (U) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Okun&#039;s law form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Unemployment rate (U)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Natural rate of unemployment (U*), Output gap (Okun gap, Ỹ) and Okun coefficient (β) changes with it. Fill it from a measurement rather than a memory — Unemployment rate (U) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Natural rate of unemployment (U*)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The long-run level of unemployment. Change it and Unemployment rate (U), Output gap (Okun gap, Ỹ) and Okun coefficient (β) changes with it. Fill it from a measurement rather than a memory — Natural rate of unemployment (U*) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Okun coefficient (β)</strong> takes a plain number with no unit attached. This represents the fractions on the labor market (labor hoarding and changes in the labor force). Change it and Unemployment rate (U), Natural rate of unemployment (U*) and Output gap (Okun gap, Ỹ) changes with it. Fill it from a measurement rather than a memory — Okun coefficient (β) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Actual GDP growth rate (Y)</strong> is a percent figure. It is worked out from Okun coefficient (β), Trend growth rate (Y*), Unemployment rate (U) and Natural rate of unemployment (U*). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Trend growth rate (Y*)</strong> is a percent figure. It is worked out from Okun coefficient (β), Actual GDP growth rate (Y), Unemployment rate (U) and Natural rate of unemployment (U*). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Output gap (Okun gap, Ỹ)</strong> is a percent figure and the page's own defaults put it at -0.09 perc. It is worked out from Unemployment rate (U), Natural rate of unemployment (U*) and Okun coefficient (β). Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Okun&#039;s law actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Actual GDP growth rate (Y) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Unemployment rate (U), Natural rate of unemployment (U*) and Okun coefficient (β) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Unemployment rate (U), Natural rate of unemployment (U*) and Okun coefficient (β) is what you already know and Actual GDP growth rate (Y) and Trend growth rate (Y*) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/stimulus-check-40k-cap">Stimulus check (40k cap) Calculator</a>, <a href="/finance/american-rescue-plan">Stimulus check - American Rescue Plan Calculator</a> and <a href="/finance/stimulus-heals-vs-heroes">Stimulus check - CAAF vs. HEALS vs. HEROES Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Okun\'s law calculator work out?', 'a' => <<<'TXT'
            Actual GDP growth rate (Y), Trend growth rate (Y*) and Output gap (Okun gap, Ỹ), from Unemployment rate (U), Natural rate of unemployment (U*) and Okun coefficient (β). The relationship is Output gap (Okun gap, Ỹ) = (Unemployment rate (U) − Natural rate of unemployment (U*)) ÷ Okun coefficient (β).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Unemployment rate (U) (percent), Natural rate of unemployment (U*) (percent), Okun coefficient (β). With unemployment rate (U), natural rate of unemployment (U*) and okun coefficient (β) in place, Actual GDP growth rate (Y) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Output gap (Okun gap, Ỹ), Unemployment rate (U), Natural rate of unemployment (U*) and Okun coefficient (β) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Output gap (Okun gap, Ỹ) = -0.09 perc. That comes from the page's own defaults, entered in Unemployment rate (U); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Actual GDP growth rate (Y) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Unemployment rate (U) blank and the page solves for it, reporting Actual GDP growth rate (Y) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Actual GDP growth rate (Y) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/stimulus-check-40k-cap', 'name' => 'Stimulus check (40k cap) Calculator'],
            ['path' => '/finance/american-rescue-plan', 'name' => 'Stimulus check - American Rescue Plan Calculator'],
            ['path' => '/finance/stimulus-heals-vs-heroes', 'name' => 'Stimulus check - CAAF vs. HEALS vs. HEROES Calculator'],
        ],
        'authors' => [],
    ],
];
