<?php

/**
 * Present value
 * /finance/present-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Present value',
    'meta' => ['title' => 'Present value Calculator — Formula & Results', 'description' => 'Present value turns number of periods and interest rate into future value and total interest. Every box can be solved for, not only the one in the title.', 'h1' => 'Present value Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'future_value',
                            'label' => 'Future value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_periods',
                            'label' => 'Number of periods',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest_rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Present value and interest',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'present_value',
                            'label' => 'Present value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_interest',
                            'label' => 'Total interest',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'future_value = present_value * (1 + interest_rate)^number_of_periods',
            'results' => ['number_of_periods' => 'log(future_value/present_value)/log(interest_rate + 1)', 'interest_rate' => 'pow(future_value/present_value, 1/number_of_periods) - 1', 'present_value' => 'future_value*pow(interest_rate + 1, -number_of_periods)', 'future_value' => 'present_value*pow(interest_rate + 1, number_of_periods)'],
        ],
        [
            'title' => 'total_interest = future_value - present_value',
            'results' => ['present_value' => 'future_value - total_interest', 'total_interest' => 'future_value - present_value', 'future_value' => 'present_value + total_interest'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Present value takes Number of periods, Interest rate and Present value and returns Future value and Total interest. It is a single relationship that reads future value out of number of periods, not a table of canned results keyed by them. Units for Future value default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Present value calculator works', 'html' => <<<'TXT'
            <p>The Present value calculator applies one relationship to 3 numbers and reports Future value and Total interest.</p><p>In the form&#039;s own words, Future value = Present value × (Interest rate + 1)^(Number of periods).</p><p>The result panel carries Future value and Total interest, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Number of periods</strong> — a plain number, no unit</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Present value</strong> — in USD</li></ul><p>The answers come back as Future value in USD, Total interest in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Number of periods = 10, Interest rate = 100 perc and Present value = 1000 USD; the answers are <strong>Future value</strong> = 1.105e+23 USD and <strong>Total interest</strong> = 1.105e+23 USD.</p><ul><li><strong>Future value</strong> = 1.105e+23 USD</li><li><strong>Total interest</strong> = 1.105e+23 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Future value</strong> = <code>Present value × (Interest rate + 1)^(Number of periods)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Future value</strong> = 1.105e+23 and <strong>Total interest</strong> = 1.105e+23 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Interest rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Future value</strong> = <code>Present value × (Interest rate + 1)^(Number of periods)</code></li><li><strong>Number of periods</strong> = <code>ln(Future value ÷ Present value) ÷ ln(Interest rate + 1)</code></li><li><strong>Interest rate</strong> = <code>(Future value ÷ Present value)^(1 ÷ Number of periods) − 1</code></li><li><strong>Present value</strong> = <code>Future value × (Interest rate + 1)^(− Number of periods)</code></li><li><strong>Total interest</strong> = <code>Future value − Present value</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Future value</strong> = <code>Present value × (Interest rate + 1)^(Number of periods)</code> — the form to use when Present value, Interest rate and Number of periods are the values you have.</li><li><strong>Number of periods</strong> = <code>ln(Future value ÷ Present value) ÷ ln(Interest rate + 1)</code> — the form to use when Future value, Present value and Interest rate are the values you have.</li><li><strong>Interest rate</strong> = <code>(Future value ÷ Present value)^(1 ÷ Number of periods) − 1</code> — the form to use when Future value, Present value and Number of periods are the values you have.</li><li><strong>Present value</strong> = <code>Future value × (Interest rate + 1)^(− Number of periods)</code> — the form to use when Future value, Interest rate and Number of periods are the values you have.</li><li><strong>Total interest</strong> = <code>Future value − Present value</code> — the form to use when Future value and Present value are the values you have.</li><li><strong>Present value</strong> = <code>Future value − Total interest</code> — the form to use when Future value and Total interest are the values you have.</li><li><strong>Future value</strong> = <code>Present value + Total interest</code> — the form to use when Present value and Total interest are the values you have.</li></ul><p>Any one of Future value, Number of periods and Interest rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Number of periods from 10 to 20, leaving every other box alone. The panel moves from <strong>Future value</strong> 1.105e+23 USD and <strong>Total interest</strong> 1.105e+23 USD to <strong>Future value</strong> 1.220e+43 USD and <strong>Total interest</strong> 1.220e+43 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Interest rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Future value and Total interest are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Number of periods left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of periods is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Number of periods and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Present value form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Number of periods</strong> takes a plain number with no unit attached. Change it and Interest rate, Present value and Future value changes with it. Fill it from a measurement rather than a memory — Number of periods is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Number of periods, Present value and Future value changes with it. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Present value</strong> takes a plain number with no unit attached. Change it and Number of periods, Interest rate and Future value changes with it. Fill it from a measurement rather than a memory — Present value is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Future value</strong> is a plain number and the page's own defaults put it at 1.105e+23. It is computed from Present value, Interest rate and Number of periods, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total interest</strong> is a plain number and the page's own defaults put it at 1.105e+23. It is computed from Future value and Present value, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Future value</th><th>Total interest</th></tr></thead><tbody><tr><td><strong>Number of periods</strong> +10%</td><td>+10000%</td><td>+10000%</td></tr><tr><td><strong>Interest rate</strong> +10%</td><td>+157%</td><td>+157%</td></tr><tr><td><strong>Present value</strong> +10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Number of periods sits at the top — a ten per cent error in that box shows up as roughly 10000 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Number of periods = 5, Interest rate = 50 perc and Present value = 500 USD and the page reports <strong>Future value</strong> = 1.725e+11 USD and <strong>Total interest</strong> = 1.725e+11 USD.</li><li>Feed in Number of periods = 30, Interest rate = 100 perc and Present value = 1000 USD and the page reports <strong>Future value</strong> = 1.348e+63 USD and <strong>Total interest</strong> = 1.348e+63 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Present value actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Future value is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Number of periods, Interest rate and Present value are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Number of periods, Interest rate and Present value measured, Future value and Total interest wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/productivity">Productivity Calculator</a>, <a href="/finance/profit">Profit Calculator</a> and <a href="/finance/profitability-index">Profitability index Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Present value calculator work out?', 'a' => <<<'TXT'
            Future value and Total interest, from Present value, Interest rate and Number of periods. The relationship is Future value = Present value × (Interest rate + 1)^(Number of periods).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of periods, Interest rate (percent), Present value (USD). Fill number of periods, interest rate and present value and leave Future value empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Future value, Number of periods, Interest rate and Present value blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Future value = 1.105e+23 USD and Total interest = 1.105e+23 USD. That comes from the page's own defaults, entered in Number of periods; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Future value is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Number of periods blank and the page solves for it, reporting Future value instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Future value at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/productivity', 'name' => 'Productivity Calculator'],
            ['path' => '/finance/profit', 'name' => 'Profit Calculator'],
            ['path' => '/finance/profitability-index', 'name' => 'Profitability index Calculator'],
        ],
        'authors' => [],
    ],
];
