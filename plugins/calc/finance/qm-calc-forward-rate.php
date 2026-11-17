<?php

/**
 * Forward rate
 * /finance/forward-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Forward rate',
    'meta' => ['title' => 'Forward rate Calculator — Formula & Results', 'description' => 'Forward rate turns time period 1 (n₁) and Spot rate for time period 1 (S₁) into forward rate. Every box can be solved for, not only the one in the title.', 'h1' => 'Forward rate Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Time period 1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_period_1',
                            'label' => 'Time period 1 (n₁)',
                            'type' => 'number',
                            'help' => 'The longer time period.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spot_rate_1',
                            'label' => 'Spot rate for time period 1 (S₁)',
                            'type' => 'number',
                            'help' => 'From today until time period 1.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Time period 2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_period_2',
                            'label' => 'Time period 2 (n₂)',
                            'type' => 'number',
                            'help' => 'The shorter time period.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spot_rate_2',
                            'label' => 'Spot rate for time period 2 (S₂)',
                            'type' => 'number',
                            'help' => 'From today until time period 2.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Forward rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'forward_rate',
                            'label' => 'Forward rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'forward_rate = ((((1 + spot_rate_1/100) ^ time_period_1) / ((1 + spot_rate_2/100) ^ time_period_2)) ^ (1 / (time_period_1 - time_period_2)) - 1)*100',
            'results' => [
                'spot_rate_2' => 'pow(pow(forward_rate + 100, -time_period_1 + time_period_2)*pow(spot_rate_1 + 100, time_period_1), 1/time_period_2) - 100',
                'forward_rate' => <<<'TXT'
                100*pow(pow(100, -time_period_1)*pow(100, time_period_2)*pow(spot_rate_1 + 100, time_period_1)*pow(spot_rate_2 + 100, -time_period_2), 1/(time_period_1 - time_period_2)) - 100
                TXT,
                'spot_rate_1' => 'pow(pow(forward_rate + 100, time_period_1 - time_period_2)*pow(spot_rate_2 + 100, time_period_2), 1/time_period_1) - 100',
                'time_period_2' => <<<'TXT'
                (time_period_1*log((1/100)*forward_rate + 1) - log(pow(100, -time_period_1)*pow(spot_rate_1 + 100, time_period_1)))/(log((1/100)*forward_rate + 1) - log((1/100)*spot_rate_2 + 1))
                TXT,
                'time_period_1' => <<<'TXT'
                (time_period_2*log((1/100)*forward_rate + 1) + log(pow(100, time_period_2)*pow(spot_rate_2 + 100, -time_period_2)))/(log((1/100)*forward_rate + 1) - log((1/100)*spot_rate_1 + 1))
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Forward rate takes Time period 1 (n₁), Spot rate for time period 1 (S₁) and Time period 2 (n₂) and returns Forward rate. It is a single relationship that reads forward rate out of time period 1 (n₁), not a table of canned results keyed by them. Units for Forward rate default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Forward rate calculator works', 'html' => <<<'TXT'
            <p>The Forward rate calculator applies one relationship to 4 numbers and reports Forward rate.</p><p>The answers are Forward rate; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Time period 1 (n₁)</strong> — in years. The longer time period.</li><li><strong>Spot rate for time period 1 (S₁)</strong> — in percent. From today until time period 1.</li><li><strong>Time period 2 (n₂)</strong> — in years. The shorter time period.</li><li><strong>Spot rate for time period 2 (S₂)</strong> — in percent. From today until time period 2.</li></ul><p>The result box is Forward rate in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Time period 1 (n₁) = 10 yrs, Spot rate for time period 1 (S₁) = 100 perc, Time period 2 (n₂) = 1000 yrs and Spot rate for time period 2 (S₂) = 10 perc gives <strong>Forward rate</strong> = 9.34 perc.</p><ul><li><strong>Forward rate</strong> = 9.34 perc</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Forward rate</strong> = 9.34 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Forward rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Spot rate for time period 2 (S₂)</strong> = <code>((Forward rate + 100)^(− Time period 1 (n₁) + Time period 2 (n₂)) × (Spot rate for time period 1 (S₁) + 100)^(Time period 1 (n₁)))^(1 ÷ Time period 2 (n₂)) − 100</code></li><li><strong>Spot rate for time period 1 (S₁)</strong> = <code>((Forward rate + 100)^(Time period 1 (n₁) − Time period 2 (n₂)) × (Spot rate for time period 2 (S₂) + 100)^(Time period 2 (n₂)))^(1 ÷ Time period 1 (n₁)) − 100</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Spot rate for time period 2 (S₂)</strong> = <code>((Forward rate + 100)^(− Time period 1 (n₁) + Time period 2 (n₂)) × (Spot rate for time period 1 (S₁) + 100)^(Time period 1 (n₁)))^(1 ÷ Time period 2 (n₂)) − 100</code> — the form to use when Forward rate, Time period 1 (n₁), Time period 2 (n₂) and Spot rate for time period 1 (S₁) are the values you have.</li><li><strong>Spot rate for time period 1 (S₁)</strong> = <code>((Forward rate + 100)^(Time period 1 (n₁) − Time period 2 (n₂)) × (Spot rate for time period 2 (S₂) + 100)^(Time period 2 (n₂)))^(1 ÷ Time period 1 (n₁)) − 100</code> — the form to use when Forward rate, Time period 1 (n₁), Time period 2 (n₂) and Spot rate for time period 2 (S₂) are the values you have.</li></ul><p>Any one of Forward rate, Spot rate for time period 2 (S₂) and Spot rate for time period 1 (S₁) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Time period 1 (n₁) from 10 to 20, leaving every other box alone. The panel moves from <strong>Forward rate</strong> 9.34 perc to <strong>Forward rate</strong> 8.67 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Time period 1 (n₁), Spot rate for time period 1 (S₁) and Time period 2 (n₂) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Forward rate is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Time period 1 (n₁) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Time period 1 (n₁) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Spot rate for time period 1 (S₁) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Spot rate for time period 1 (S₁) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Time period 1 (n₁) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Time period 1 (n₁)</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The longer time period. Change it and Spot rate for time period 2 (S₂), Forward rate and Spot rate for time period 1 (S₁) changes with it. Have it to hand before you start: Time period 1 (n₁) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Spot rate for time period 1 (S₁)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. From today until time period 1. Change it and Spot rate for time period 2 (S₂), Forward rate and Time period 2 (n₂) changes with it. Have it to hand before you start: Spot rate for time period 1 (S₁) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Time period 2 (n₂)</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The shorter time period. Change it and Spot rate for time period 2 (S₂), Forward rate and Spot rate for time period 1 (S₁) changes with it. Have it to hand before you start: Time period 2 (n₂) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Spot rate for time period 2 (S₂)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. From today until time period 2. Change it and Forward rate, Spot rate for time period 1 (S₁) and Time period 2 (n₂) changes with it. Have it to hand before you start: Spot rate for time period 2 (S₂) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Forward rate</strong> is a percent figure and the page's own defaults put it at 9.34 perc. It is computed from Time period 1 (n₁), Time period 2 (n₂), Spot rate for time period 1 (S₁) and Spot rate for time period 2 (S₂), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Forward rate</th></tr></thead><tbody><tr><td><strong>Time period 1 (n₁)</strong> +10%</td><td>-0.71%</td></tr><tr><td><strong>Spot rate for time period 1 (S₁)</strong> +10%</td><td>-0.58%</td></tr><tr><td><strong>Time period 2 (n₂)</strong> +10%</td><td>+0.65%</td></tr><tr><td><strong>Spot rate for time period 2 (S₂)</strong> +10%</td><td>+10.75%</td></tr></tbody></table><p>Ranked by leverage, Spot rate for time period 2 (S₂) sits at the top — a ten per cent error in that box shows up as roughly 10.8 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Time period 1 (n₁) = 5 yrs, Spot rate for time period 1 (S₁) = 50 perc, Time period 2 (n₂) = 500 yrs and Spot rate for time period 2 (S₂) = 5 perc, the answer is <strong>Forward rate</strong> = 4.62 perc.</li><li>With Time period 1 (n₁) = 30 yrs, Spot rate for time period 1 (S₁) = 100 perc, Time period 2 (n₂) = 1000 yrs and Spot rate for time period 2 (S₂) = 10 perc, the answer is <strong>Forward rate</strong> = 7.98 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Forward rate is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Time period 1 (n₁), Spot rate for time period 1 (S₁) and Time period 2 (n₂) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Time period 1 (n₁), Spot rate for time period 1 (S₁) and Time period 2 (n₂) and the number you are missing is Forward rate.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/true-cost-of-real-estate-commission">True cost of real estate commission Calculator</a>, <a href="/finance/trump-tariff">Trump tariff Calculator</a> and <a href="/finance/trump-tax">Trump tax Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Forward rate calculator work out?', 'a' => 'Forward rate, from Time period 1 (n₁), Time period 2 (n₂), Spot rate for time period 1 (S₁) and Spot rate for time period 2 (S₂).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Time period 1 (n₁) (years), Spot rate for time period 1 (S₁) (percent), Time period 2 (n₂) (years), Spot rate for time period 2 (S₂) (percent). With time period 1 (n₁), spot rate for time period 1 (S₁) and time period 2 (n₂) in place, Forward rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Forward rate, Spot rate for time period 2 (S₂), Spot rate for time period 1 (S₁) and Time period 2 (n₂) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Forward rate = 9.34 perc. That comes from the page\'s own defaults, entered in Time period 1 (n₁); change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Forward rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Time period 1 (n₁) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Forward rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/true-cost-of-real-estate-commission', 'name' => 'True cost of real estate commission Calculator'],
            ['path' => '/finance/trump-tariff', 'name' => 'Trump tariff Calculator'],
            ['path' => '/finance/trump-tax', 'name' => 'Trump tax Calculator'],
        ],
        'authors' => [],
    ],
];
