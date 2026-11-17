<?php

/**
 * Month-over-month
 * /finance/month-over-month
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Month-over-month',
    'meta' => ['title' => 'Month-over-month — Formula, Steps & Examples', 'description' => 'Month-over-month works out CMGR and quarter-over-quarter change and reports both. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Month-over-month Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Month-over-month',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'month_1',
                            'label' => 'Value in month 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'month_2',
                            'label' => 'Value in month 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_increase_or_decrease',
                            'label' => 'Month-over-month change',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Compounding monthly growth rate (CMGR)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'measurement_in_first_month',
                            'label' => 'Value in first month',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'measurement_in_last_month',
                            'label' => 'Value in last month',
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
                            'help' => 'Time duration between the first and last month. For example, if January is the 1st month and June is the 6th, then the duration is 5 months.',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cmgr',
                            'label' => 'CMGR',
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
            'title' => 'Quarter-over-quarter',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quarter_1',
                            'label' => 'Value quarter 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'quarter_2',
                            'label' => 'Value quarter 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_increase_or_decrease_q',
                            'label' => 'Quarter-over-quarter change',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Year-over-year',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year_1',
                            'label' => 'Value year 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year_2',
                            'label' => 'Value year 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.00001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_increase_or_decrease_y',
                            'label' => 'Year-over-year change',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'percent_increase_or_decrease = (month_2 - month_1) / month_1 * 100 ',
            'results' => ['month_1' => '100*month_2/(percent_increase_or_decrease + 100)', 'month_2' => '(1/100)*month_1*(percent_increase_or_decrease + 100)', 'percent_increase_or_decrease' => '-100 + 100*month_2/month_1'],
        ],
        [
            'title' => 'percent_increase_or_decrease_q = (quarter_2 - quarter_1) / quarter_1 * 100 ',
            'results' => ['quarter_2' => '(1/100)*quarter_1*(percent_increase_or_decrease_q + 100)', 'quarter_1' => '100*quarter_2/(percent_increase_or_decrease_q + 100)', 'percent_increase_or_decrease_q' => '-100 + 100*quarter_2/quarter_1'],
        ],
        [
            'title' => 'percent_increase_or_decrease_y = (year_2 - year_1) / year_1 * 100 ',
            'results' => ['year_2' => '(1/100)*year_1*(percent_increase_or_decrease_y + 100)', 'percent_increase_or_decrease_y' => '-100 + 100*year_2/year_1', 'year_1' => '100*year_2/(percent_increase_or_decrease_y + 100)'],
        ],
        [
            'title' => 'cmgr = (measurement_in_last_month/measurement_in_first_month) ^ (1/(duration)) - 1',
            'results' => ['cmgr' => 'pow(measurement_in_last_month/measurement_in_first_month, 1/duration) - 1', 'measurement_in_last_month' => 'measurement_in_first_month*pow(cmgr + 1, duration)', 'duration' => 'log(measurement_in_last_month/measurement_in_first_month)/log(cmgr + 1)', 'measurement_in_first_month' => 'measurement_in_last_month*pow(cmgr + 1, -duration)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Month-over-month works out Month-over-month change and Value in first month from Value in month 1 and Value in month 2. Nothing is looked up on this page: month-over-month change is computed from value in month 1 and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Month-over-month change is opened in %; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Month-over-month calculator works', 'html' => <<<'TXT'
            <p>The Month-over-month calculator applies one relationship to 2 numbers and reports Month-over-month change, Value in first month and Value in last month.</p><p>Written with the labels from the form, Month-over-month change = − 100 + 100 × Value in month 2 ÷ Value in month 1.</p><p>What comes back is Month-over-month change, Value in first month, Value in last month and Time duration — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Value in month 1</strong> — a plain number, no unit</li><li><strong>Value in month 2</strong> — a plain number, no unit</li></ul><p>The answers come back as Month-over-month change in %, Value in first month, Value in last month, Time duration in months, CMGR in percent, Value quarter 1, Value quarter 2, Quarter-over-quarter change in %, Value year 1, Value year 2, Year-over-year change in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Value in month 1 = 10, Value in month 2 = 100, Value in first month = 1000, Value in last month = 10, Time duration = 100 mos, CMGR = 1000 perc, Value quarter 1 = 10, Value quarter 2 = 100, Quarter-over-quarter change = 1000 %, Value year 1 = 10, Value year 2 = 100 and Year-over-year change = 1000 % — through the same formula and the panel reports <strong>Month-over-month change</strong> = 900 %.</p><ul><li><strong>Month-over-month change</strong> = 900 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Month-over-month change</strong> = <code>− 100 + 100 × Value in month 2 ÷ Value in month 1</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Month-over-month change</strong> = 900. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Time duration lists 5 options and opens on months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Month-over-month change</strong> = <code>− 100 + 100 × Value in month 2 ÷ Value in month 1</code></li><li><strong>Value in month 1</strong> = <code>100 × Value in month 2 ÷ (Month-over-month change + 100)</code></li><li><strong>Value in month 2</strong> = <code>(1 ÷ 100) × Value in month 1 × (Month-over-month change + 100)</code></li><li><strong>Quarter-over-quarter change</strong> = <code>− 100 + 100 × Value quarter 2 ÷ Value quarter 1</code></li><li><strong>Value quarter 2</strong> = <code>(1 ÷ 100) × Value quarter 1 × (Quarter-over-quarter change + 100)</code></li><li><strong>Value quarter 1</strong> = <code>100 × Value quarter 2 ÷ (Quarter-over-quarter change + 100)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Month-over-month change</strong> = <code>− 100 + 100 × Value in month 2 ÷ Value in month 1</code> — the form to use when Value in month 2 and Value in month 1 are the values you have.</li><li><strong>Value in month 1</strong> = <code>100 × Value in month 2 ÷ (Month-over-month change + 100)</code> — the form to use when Value in month 2 and Month-over-month change are the values you have.</li><li><strong>Value in month 2</strong> = <code>(1 ÷ 100) × Value in month 1 × (Month-over-month change + 100)</code> — the form to use when Value in month 1 and Month-over-month change are the values you have.</li><li><strong>Quarter-over-quarter change</strong> = <code>− 100 + 100 × Value quarter 2 ÷ Value quarter 1</code> — the form to use when Value quarter 2 and Value quarter 1 are the values you have.</li><li><strong>Value quarter 2</strong> = <code>(1 ÷ 100) × Value quarter 1 × (Quarter-over-quarter change + 100)</code> — the form to use when Value quarter 1 and Quarter-over-quarter change are the values you have.</li><li><strong>Value quarter 1</strong> = <code>100 × Value quarter 2 ÷ (Quarter-over-quarter change + 100)</code> — the form to use when Value quarter 2 and Quarter-over-quarter change are the values you have.</li><li><strong>Year-over-year change</strong> = <code>− 100 + 100 × Value year 2 ÷ Value year 1</code> — the form to use when Value year 2 and Value year 1 are the values you have.</li><li><strong>Value year 2</strong> = <code>(1 ÷ 100) × Value year 1 × (Year-over-year change + 100)</code> — the form to use when Value year 1 and Year-over-year change are the values you have.</li></ul><p>Any one of Month-over-month change, Value in month 1 and Value in month 2 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Value in month 1, from 10 to 20 — and the answers go from <strong>Month-over-month change</strong> 900 % to <strong>Month-over-month change</strong> 400 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Month-over-month change, Value in first month and Value in last month are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Value in month 1 left as a guess.</strong> Anything typed into Value in month 1 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Value in month 2 left as a guess.</strong> Anything typed into Value in month 2 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Value in month 1 and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Value in month 1</strong> takes a plain number with no unit attached. Change it and Value in month 2 and Month-over-month change changes with it. Have it to hand before you start: Value in month 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Value in month 2</strong> takes a plain number with no unit attached. Change it and Value in month 1 and Month-over-month change changes with it. Have it to hand before you start: Value in month 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Month-over-month change</strong> is a plain number and the page's own defaults put it at 900. It is worked out from Value in month 2 and Value in month 1. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Value in first month</strong> is a plain number. It is worked out from Value in last month, CMGR and Time duration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Value in last month</strong> is a plain number. It is worked out from Value in first month, CMGR and Time duration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Time duration</strong> is a months figure. It is worked out from Value in last month, Value in first month and CMGR. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>CMGR</strong> is a percent figure. It is worked out from Value in last month, Value in first month and Time duration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Value quarter 1</strong> is a plain number. It is worked out from Value quarter 2 and Quarter-over-quarter change. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Value quarter 2</strong> is a plain number. It is worked out from Value quarter 1 and Quarter-over-quarter change. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Quarter-over-quarter change</strong> is a plain number. It is worked out from Value quarter 2 and Value quarter 1. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Value year 1</strong> is a plain number. It is worked out from Value year 2 and Year-over-year change. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Value year 2</strong> is a plain number. It is worked out from Value year 1 and Year-over-year change. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Year-over-year change</strong> is a plain number. It is worked out from Value year 2 and Value year 1. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Month-over-month change is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are months and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Value in month 1 and Value in month 2 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Value in month 1 and Value in month 2 is what you already know and Month-over-month change and Value in first month is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/home-value-us">Home value US Calculator</a>, <a href="/finance/hourly-to-annual-salary">Hourly to annual salary Calculator</a> and <a href="/finance/hourly-to-salary-with-overtime">Hourly to salary with overtime</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Month-over-month calculator work out?', 'a' => <<<'TXT'
            Month-over-month change, Value in first month, Value in last month and Time duration, from Value in month 2 and Value in month 1. The relationship is Month-over-month change = − 100 + 100 × Value in month 2 ÷ Value in month 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Value in month 1, Value in month 2. Fill value in month 1 and value in month 2 and leave Month-over-month change empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Month-over-month change, Value in month 1, Value in month 2 and Quarter-over-quarter change blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Month-over-month change = 900 %. The figures come from Value in month 1 as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Month-over-month change is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Value in month 1 left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Month-over-month change at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/home-value-us', 'name' => 'Home value US Calculator'],
            ['path' => '/finance/hourly-to-annual-salary', 'name' => 'Hourly to annual salary Calculator'],
            ['path' => '/finance/hourly-to-salary-with-overtime', 'name' => 'Hourly to salary with overtime'],
        ],
        'authors' => [],
    ],
];
