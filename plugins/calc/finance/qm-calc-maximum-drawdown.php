<?php

/**
 * Maximum drawdown
 * /finance/maximum-drawdown
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Maximum drawdown',
    'meta' => ['title' => 'Maximum drawdown Calculator: Free, With Steps', 'description' => 'Maximum drawdown turns peak value, lowest value after peak and time needed for recovery into annual growth rate. The formula is printed in the form\'s own words.', 'h1' => 'Maximum drawdown Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'peak',
                            'label' => 'Peak value',
                            'type' => 'number',
                            'help' => 'Maximum investment value at a certain point in time.',
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
                            'name' => 'lowest',
                            'label' => 'Lowest value after peak',
                            'type' => 'number',
                            'help' => 'At this exact moment, what is the value of your investment?',
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
                            'name' => 'draw',
                            'label' => 'Maximum drawdown',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Time for recovery',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'growth_rate',
                            'label' => 'Annual growth rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_periods',
                            'label' => 'Time needed for recovery',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'draw=(lowest-peak)/peak',
            'results' => ['draw' => '(lowest - peak)/peak', 'peak' => 'lowest/(draw + 1)', 'lowest' => 'peak*(draw + 1)'],
        ],
        [
            'title' => '(peak/ lowest)^(1/number_of_periods) -1 = growth_rate',
            'results' => ['growth_rate' => 'pow(peak/lowest, 1/number_of_periods) - 1', 'peak' => 'lowest*pow(growth_rate + 1, number_of_periods)', 'lowest' => 'peak*pow(growth_rate + 1, -number_of_periods)', 'number_of_periods' => 'log(peak/lowest)/log(growth_rate + 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Maximum drawdown turns Peak value and Lowest value after peak into Maximum drawdown and Annual growth rate. There is no hidden constant here: change maximum drawdown and peak value moves with it. The main result, Maximum drawdown, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Maximum drawdown calculator works', 'html' => <<<'TXT'
            <p>Maximum drawdown answers one question from 2 numbers, and the answer is Maximum drawdown, Annual growth rate and Time needed for recovery.</p><p>Written with the labels from the form, Maximum drawdown = (Lowest value after peak − Peak value) ÷ Peak value.</p><p>The answers are Maximum drawdown, Annual growth rate and Time needed for recovery; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Peak value</strong> — in USD. Maximum investment value at a certain point in time.</li><li><strong>Lowest value after peak</strong> — in USD. At this exact moment, what is the value of your investment?</li></ul><p>The result boxes are Maximum drawdown in percent, Annual growth rate in percent, Time needed for recovery in years; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Peak value = 10 USD, Lowest value after peak = 100 USD, Annual growth rate = 1000 perc and Time needed for recovery = 10 yrs; the answers are <strong>Maximum drawdown</strong> = 9 perc.</p><ul><li><strong>Maximum drawdown</strong> = 9 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Maximum drawdown</strong> = <code>(Lowest value after peak − Peak value) ÷ Peak value</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Maximum drawdown</strong> = 9 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Maximum drawdown offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Maximum drawdown</strong> = <code>(Lowest value after peak − Peak value) ÷ Peak value</code></li><li><strong>Peak value</strong> = <code>Lowest value after peak ÷ (Maximum drawdown + 1)</code></li><li><strong>Lowest value after peak</strong> = <code>Peak value × (Maximum drawdown + 1)</code></li><li><strong>Annual growth rate</strong> = <code>(Peak value ÷ Lowest value after peak)^(1 ÷ Time needed for recovery) − 1</code></li><li><strong>Time needed for recovery</strong> = <code>ln(Peak value ÷ Lowest value after peak) ÷ ln(Annual growth rate + 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Maximum drawdown</strong> = <code>(Lowest value after peak − Peak value) ÷ Peak value</code> — the form to use when Lowest value after peak and Peak value are the values you have.</li><li><strong>Peak value</strong> = <code>Lowest value after peak ÷ (Maximum drawdown + 1)</code> — the form to use when Lowest value after peak and Maximum drawdown are the values you have.</li><li><strong>Lowest value after peak</strong> = <code>Peak value × (Maximum drawdown + 1)</code> — the form to use when Peak value and Maximum drawdown are the values you have.</li><li><strong>Annual growth rate</strong> = <code>(Peak value ÷ Lowest value after peak)^(1 ÷ Time needed for recovery) − 1</code> — the form to use when Peak value, Lowest value after peak and Time needed for recovery are the values you have.</li><li><strong>Peak value</strong> = <code>Lowest value after peak × (Annual growth rate + 1)^(Time needed for recovery)</code> — the form to use when Lowest value after peak, Annual growth rate and Time needed for recovery are the values you have.</li><li><strong>Lowest value after peak</strong> = <code>Peak value × (Annual growth rate + 1)^(− Time needed for recovery)</code> — the form to use when Peak value, Annual growth rate and Time needed for recovery are the values you have.</li><li><strong>Time needed for recovery</strong> = <code>ln(Peak value ÷ Lowest value after peak) ÷ ln(Annual growth rate + 1)</code> — the form to use when Peak value, Lowest value after peak and Annual growth rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Maximum drawdown, Peak value and Lowest value after peak can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Peak value from 10 to 20, leaving every other box alone. The panel moves from <strong>Maximum drawdown</strong> 9 perc to <strong>Maximum drawdown</strong> 4 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Maximum drawdown, Annual growth rate and Time needed for recovery are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Peak value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Peak value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Lowest value after peak left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Lowest value after peak is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Peak value and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Peak value</strong> takes a plain number with no unit attached. Maximum investment value at a certain point in time. The page reads it when it works out Maximum drawdown, Lowest value after peak and Annual growth rate. Have it to hand before you start: Peak value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Lowest value after peak</strong> takes a plain number with no unit attached. At this exact moment, what is the value of your investment?. The page reads it when it works out Maximum drawdown, Peak value and Annual growth rate. Have it to hand before you start: Lowest value after peak is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Maximum drawdown</strong> is a percent figure and the page's own defaults put it at 9 perc. The value follows from Lowest value after peak and Peak value. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Annual growth rate</strong> is a percent figure. The value follows from Peak value, Lowest value after peak and Time needed for recovery. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Time needed for recovery</strong> is a years figure. The value follows from Peak value, Lowest value after peak and Annual growth rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Maximum drawdown</th></tr></thead><tbody><tr><td><strong>Peak value</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Lowest value after peak</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Annual growth rate</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Time needed for recovery</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Lowest value after peak sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. By contrast, Annual growth rate and Time needed for recovery barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Peak value = 5 USD, Lowest value after peak = 50 USD, Annual growth rate = 500 perc and Time needed for recovery = 5 yrs, the answer is <strong>Maximum drawdown</strong> = 9 perc.</li><li>With Peak value = 30 USD, Lowest value after peak = 100 USD, Annual growth rate = 1000 perc and Time needed for recovery = 10 yrs, the answer is <strong>Maximum drawdown</strong> = 2.33 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Maximum drawdown is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Peak value and Lowest value after peak are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Peak value and Lowest value after peak measured, Maximum drawdown and Annual growth rate wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/phillips-curve">Phillips curve Calculator</a>, <a href="/finance/piti">PITI Calculator</a> and <a href="/finance/pivot-point">Pivot point Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Maximum drawdown calculator work out?', 'a' => <<<'TXT'
            Maximum drawdown, Annual growth rate and Time needed for recovery, from Lowest value after peak and Peak value. The relationship is Maximum drawdown = (Lowest value after peak − Peak value) ÷ Peak value.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Peak value (USD), Lowest value after peak (USD). Enter peak value and lowest value after peak; Maximum drawdown is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Maximum drawdown, Peak value, Lowest value after peak and Annual growth rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Maximum drawdown = 9 perc. That comes from the page\'s own defaults, entered in Peak value; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Maximum drawdown is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Peak value left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Maximum drawdown at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/phillips-curve', 'name' => 'Phillips curve Calculator'],
            ['path' => '/finance/piti', 'name' => 'PITI Calculator'],
            ['path' => '/finance/pivot-point', 'name' => 'Pivot point Calculator'],
        ],
        'authors' => [],
    ],
];
