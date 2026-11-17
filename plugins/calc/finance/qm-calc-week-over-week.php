<?php

/**
 * Week over week
 * /finance/week-over-week
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Week over week',
    'meta' => ['title' => 'Week over week Calculator — Formula & Results', 'description' => 'Week over week takes value in initial week and returns average weekly growth (compounded). Results come back in perc, with any other unit a click away.', 'h1' => 'Week over week Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Week over week growth',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'last_week',
                            'label' => 'Value in initial week',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'this_week',
                            'label' => 'Value in following week',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'change',
                            'label' => 'Week over week % change',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Weekly CAGR (compounded growth)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'week_1',
                            'label' => 'Value in first week',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'week_2',
                            'label' => 'Value in final week',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'duration',
                            'label' => 'Time duration',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cwgr',
                            'label' => 'Average weekly growth (compounded)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'change = ((this_week / last_week) - 1)',
            'results' => ['change' => '(-last_week + this_week)/last_week', 'last_week' => 'this_week/(change + 1)', 'this_week' => 'last_week*(change + 1)'],
        ],
        [
            'title' => 'cwgr = (week_2/week_1) ^ (1/(duration)) - 1',
            'results' => ['week_2' => 'week_1*pow(cwgr + 1, duration)', 'cwgr' => 'pow(week_2/week_1, 1/duration) - 1', 'duration' => 'log(week_2/week_1)/log(cwgr + 1)', 'week_1' => 'week_2*pow(cwgr + 1, -duration)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Week over week takes Value in initial week and Value in following week and returns Week over week % change and Value in first week. The arithmetic is the whole method: week over week % change is worked out from value in initial week by one formula, applied once. Week over week % change comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Week over week calculator works', 'html' => <<<'TXT'
            <p>Week over week answers one question from 2 numbers, and the answer is Week over week % change, Value in first week and Value in final week.</p><p>Written with the labels from the form, Week over week % change = ( − Value in initial week + Value in following week) ÷ Value in initial week.</p><p>The result panel carries Week over week % change, Value in first week, Value in final week and Time duration, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Value in initial week</strong> — a plain number, no unit</li><li><strong>Value in following week</strong> — a plain number, no unit</li></ul><p>The result boxes are Week over week % change in percent, Value in first week, Value in final week, Time duration in weeks, Average weekly growth (compounded) in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Value in initial week = 10, Value in following week = 100, Value in first week = 1000, Value in final week = 10, Time duration = 100 wk and Average weekly growth (compounded) = 1000 perc — through the same formula and the panel reports <strong>Week over week % change</strong> = 9 perc.</p><ul><li><strong>Week over week % change</strong> = 9 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Week over week % change</strong> = <code>( − Value in initial week + Value in following week) ÷ Value in initial week</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Week over week % change</strong> = 9 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Week over week % change offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Week over week % change</strong> = <code>( − Value in initial week + Value in following week) ÷ Value in initial week</code></li><li><strong>Value in initial week</strong> = <code>Value in following week ÷ (Week over week % change + 1)</code></li><li><strong>Value in following week</strong> = <code>Value in initial week × (Week over week % change + 1)</code></li><li><strong>Average weekly growth (compounded)</strong> = <code>(Value in final week ÷ Value in first week)^(1 ÷ Time duration) − 1</code></li><li><strong>Value in final week</strong> = <code>Value in first week × (Average weekly growth (compounded) + 1)^(Time duration)</code></li><li><strong>Time duration</strong> = <code>ln(Value in final week ÷ Value in first week) ÷ ln(Average weekly growth (compounded) + 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Week over week % change</strong> = <code>( − Value in initial week + Value in following week) ÷ Value in initial week</code> — the form to use when Value in initial week and Value in following week are the values you have.</li><li><strong>Value in initial week</strong> = <code>Value in following week ÷ (Week over week % change + 1)</code> — the form to use when Value in following week and Week over week % change are the values you have.</li><li><strong>Value in following week</strong> = <code>Value in initial week × (Week over week % change + 1)</code> — the form to use when Value in initial week and Week over week % change are the values you have.</li><li><strong>Average weekly growth (compounded)</strong> = <code>(Value in final week ÷ Value in first week)^(1 ÷ Time duration) − 1</code> — the form to use when Value in final week, Value in first week and Time duration are the values you have.</li><li><strong>Value in final week</strong> = <code>Value in first week × (Average weekly growth (compounded) + 1)^(Time duration)</code> — the form to use when Value in first week, Average weekly growth (compounded) and Time duration are the values you have.</li><li><strong>Time duration</strong> = <code>ln(Value in final week ÷ Value in first week) ÷ ln(Average weekly growth (compounded) + 1)</code> — the form to use when Value in final week, Value in first week and Average weekly growth (compounded) are the values you have.</li><li><strong>Value in first week</strong> = <code>Value in final week × (Average weekly growth (compounded) + 1)^(− Time duration)</code> — the form to use when Value in final week, Average weekly growth (compounded) and Time duration are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Week over week % change, Value in initial week and Value in following week can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Value in initial week, from 10 to 20 — and the answers go from <strong>Week over week % change</strong> 9 perc to <strong>Week over week % change</strong> 4 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Week over week % change, Value in first week and Value in final week are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Value in initial week left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Value in initial week is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Value in following week left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Value in following week is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Value in initial week to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Week over week form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Value in initial week</strong> takes a plain number with no unit attached. The page reads it when it works out Week over week % change and Value in following week. Fill it from a measurement rather than a memory — Value in initial week is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Value in following week</strong> takes a plain number with no unit attached. The page reads it when it works out Week over week % change and Value in initial week. Fill it from a measurement rather than a memory — Value in following week is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Week over week % change</strong> is a percent figure and the page's own defaults put it at 9 perc. The value follows from Value in initial week and Value in following week. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Value in first week</strong> is a plain number. The value follows from Value in final week, Average weekly growth (compounded) and Time duration. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Value in final week</strong> is a plain number. The value follows from Value in first week, Average weekly growth (compounded) and Time duration. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Time duration</strong> is a weeks figure. The value follows from Value in final week, Value in first week and Average weekly growth (compounded). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Average weekly growth (compounded)</strong> is a percent figure. The value follows from Value in final week, Value in first week and Time duration. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Week over week actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>weeks</strong> — opens in <em>wk</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Week over week % change is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and weeks and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Value in initial week and Value in following week are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Value in initial week and Value in following week is what you already know and Week over week % change and Value in first week is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/lcr">Liquidity coverage ratio (LCR)</a>, <a href="/finance/loan-balance">Loan balance</a> and <a href="/finance/loan">Loan Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Week over week calculator work out?', 'a' => <<<'TXT'
            Week over week % change, Value in first week, Value in final week and Time duration, from Value in initial week and Value in following week. The relationship is Week over week % change = ( − Value in initial week + Value in following week) ÷ Value in initial week.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Value in initial week, Value in following week. Enter value in initial week and value in following week; Week over week % change is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Week over week % change, Value in initial week, Value in following week and Average weekly growth (compounded) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Week over week % change = 9 perc. That comes from the page\'s own defaults, entered in Value in initial week; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Week over week % change is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Value in initial week blank and the page solves for it, reporting Week over week % change instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Week over week % change at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/lcr', 'name' => 'Liquidity coverage ratio (LCR)'],
            ['path' => '/finance/loan-balance', 'name' => 'Loan balance'],
            ['path' => '/finance/loan', 'name' => 'Loan Calculator'],
        ],
        'authors' => [],
    ],
];
