<?php

/**
 * CAGR
 * /finance/cagr
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CAGR',
    'meta' => ['title' => 'CAGR Calculator — Free, With Worked Examples', 'description' => 'CAGR works out compound Annual Growth Rate (CAGR) from number of periods and initial value. Every box can be solved for, not only the one in the title.', 'h1' => 'CAGR Calculator', 'updated' => '2026-10-05'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'growth_rate',
                            'label' => 'Compound Annual Growth Rate (CAGR)',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.000001'],
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
                            'help' => 'Number of full years (e.g., 1st Jan 2016 until 1st Jan 2020 is 4 full calendar years).',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_value',
                            'label' => 'Initial value',
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
                            'name' => 'final_value',
                            'label' => 'Final value',
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
        [
            'title' => 'Change in value',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'difference',
                            'label' => 'Difference',
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
                            'name' => 'total_growth',
                            'label' => 'Total growth',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => '100*((final_value/ initial_value )^(1/number_of_periods) -1 ) = growth_rate',
            'results' => ['growth_rate' => '100*pow(final_value/initial_value, 1/number_of_periods) - 100', 'initial_value' => 'pow(100, number_of_periods)*final_value*pow(growth_rate + 100, -number_of_periods)', 'number_of_periods' => 'log(final_value/initial_value)/log((1/100)*growth_rate + 1)', 'final_value' => 'initial_value*pow((1/100)*growth_rate + 1, number_of_periods)'],
        ],
        [
            'title' => 'difference = final_value - initial_value',
            'results' => ['initial_value' => '-difference + final_value', 'difference' => 'final_value - initial_value', 'final_value' => 'difference + initial_value'],
        ],
        [
            'title' => 'total_growth = 100 * difference/initial_value',
            'results' => ['initial_value' => '100*difference/total_growth', 'total_growth' => '100*difference/initial_value', 'difference' => '(1/100)*initial_value*total_growth'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        CAGR takes Initial value and Final value and returns Compound Annual Growth Rate (CAGR) and Number of periods. It is a single relationship that reads compound Annual Growth Rate (CAGR) out of initial value, not a table of canned results keyed by them. Units for Compound Annual Growth Rate (CAGR) default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the CAGR calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind CAGR: it takes 2 numbers and reports Compound Annual Growth Rate (CAGR), Number of periods and Difference.</p><p>Written with the labels from the form, Compound Annual Growth Rate (CAGR) = 100 × (Final value ÷ Initial value)^(1 ÷ Number of periods) − 100.</p><p>The answers are Compound Annual Growth Rate (CAGR), Number of periods, Difference and Total growth; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Initial value</strong> — in USD</li><li><strong>Final value</strong> — in USD</li></ul><p>The result boxes are Compound Annual Growth Rate (CAGR) in %, Number of periods, Difference in USD, Total growth in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Compound Annual Growth Rate (CAGR) = 10 %, Number of periods = 100, Initial value = 1000 USD, Final value = 10 USD and Total growth = 100 %; the answers are <strong>Difference</strong> = -990 USD.</p><ul><li><strong>Difference</strong> = -990 USD</li></ul><p>The line behind those figures is <strong>Compound Annual Growth Rate (CAGR)</strong> = <code>100 × (Final value ÷ Initial value)^(1 ÷ Number of periods) − 100</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Difference</strong> = -990 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Compound Annual Growth Rate (CAGR) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Compound Annual Growth Rate (CAGR)</strong> = <code>100 × (Final value ÷ Initial value)^(1 ÷ Number of periods) − 100</code></li><li><strong>Initial value</strong> = <code>(100)^(Number of periods) × Final value × (Compound Annual Growth Rate (CAGR) + 100)^(− Number of periods)</code></li><li><strong>Number of periods</strong> = <code>ln(Final value ÷ Initial value) ÷ ln((1 ÷ 100) × Compound Annual Growth Rate (CAGR) + 1)</code></li><li><strong>Final value</strong> = <code>Initial value × ((1 ÷ 100) × Compound Annual Growth Rate (CAGR) + 1)^(Number of periods)</code></li><li><strong>Difference</strong> = <code>Final value − Initial value</code></li><li><strong>Total growth</strong> = <code>100 × Difference ÷ Initial value</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Compound Annual Growth Rate (CAGR)</strong> = <code>100 × (Final value ÷ Initial value)^(1 ÷ Number of periods) − 100</code> — the form to use when Final value, Initial value and Number of periods are the values you have.</li><li><strong>Initial value</strong> = <code>(100)^(Number of periods) × Final value × (Compound Annual Growth Rate (CAGR) + 100)^(− Number of periods)</code> — the form to use when Number of periods, Final value and Compound Annual Growth Rate (CAGR) are the values you have.</li><li><strong>Number of periods</strong> = <code>ln(Final value ÷ Initial value) ÷ ln((1 ÷ 100) × Compound Annual Growth Rate (CAGR) + 1)</code> — the form to use when Final value, Initial value and Compound Annual Growth Rate (CAGR) are the values you have.</li><li><strong>Final value</strong> = <code>Initial value × ((1 ÷ 100) × Compound Annual Growth Rate (CAGR) + 1)^(Number of periods)</code> — the form to use when Initial value, Compound Annual Growth Rate (CAGR) and Number of periods are the values you have.</li><li><strong>Difference</strong> = <code>Final value − Initial value</code> — the form to use when Final value and Initial value are the values you have.</li><li><strong>Initial value</strong> = <code>− Difference + Final value</code> — the form to use when Difference and Final value are the values you have.</li><li><strong>Final value</strong> = <code>Difference + Initial value</code> — the form to use when Difference and Initial value are the values you have.</li><li><strong>Total growth</strong> = <code>100 × Difference ÷ Initial value</code> — the form to use when Difference and Initial value are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Compound Annual Growth Rate (CAGR), Initial value and Number of periods can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Compound Annual Growth Rate (CAGR) from 10 to 20, leaving every other box alone. The panel moves from <strong>Difference</strong> -990 USD to <strong>Difference</strong> -990 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Compound Annual Growth Rate (CAGR), Number of periods and Difference are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Initial value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Final value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Final value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Initial value and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Initial value</strong> takes a plain number with no unit attached. It feeds Compound Annual Growth Rate (CAGR), Number of periods and Final value. Have it to hand before you start: Initial value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final value</strong> takes a plain number with no unit attached. It feeds Compound Annual Growth Rate (CAGR), Initial value and Number of periods. Have it to hand before you start: Final value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Compound Annual Growth Rate (CAGR)</strong> is a plain number. The value follows from Final value, Initial value and Number of periods. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Number of periods</strong> is a plain number. The value follows from Final value, Initial value and Compound Annual Growth Rate (CAGR). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Difference</strong> is a plain number and the page's own defaults put it at -990. The value follows from Final value and Initial value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total growth</strong> is a plain number. The value follows from Difference and Initial value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Difference</th></tr></thead><tbody><tr><td><strong>Compound Annual Growth Rate (CAGR)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of periods</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Initial value</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Final value</strong> +10%</td><td>+0.1%</td></tr><tr><td><strong>Total growth</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Initial value sits at the top — a ten per cent error in that box shows up as roughly 10.1 per cent in the answer. By contrast, Final value, Compound Annual Growth Rate (CAGR) and Number of periods barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Compound Annual Growth Rate (CAGR) = 5 %, Number of periods = 50, Initial value = 500 USD, Final value = 5 USD and Total growth = 50 %, the answer is <strong>Difference</strong> = -495 USD.</li><li>With Compound Annual Growth Rate (CAGR) = 30 %, Number of periods = 100, Initial value = 1000 USD, Final value = 10 USD and Total growth = 100 %, the answer is <strong>Difference</strong> = -990 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Compound Annual Growth Rate (CAGR) is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial value and Final value are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Initial value and Final value and the number you are missing is Compound Annual Growth Rate (CAGR) and Number of periods.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/nopat">NOPAT</a>, <a href="/finance/net-present-value">NPV</a> and <a href="/finance/nsfr">NSFR</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CAGR calculator work out?', 'a' => <<<'TXT'
            Compound Annual Growth Rate (CAGR), Number of periods, Difference and Total growth, from Final value, Initial value and Number of periods. The relationship is Compound Annual Growth Rate (CAGR) = 100 × (Final value ÷ Initial value)^(1 ÷ Number of periods) − 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial value (USD), Final value (USD). Enter initial value and final value; Compound Annual Growth Rate (CAGR) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Compound Annual Growth Rate (CAGR), Initial value, Number of periods and Final value can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Difference = -990 USD. That comes from the page\'s own defaults, entered in Initial value; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Compound Annual Growth Rate (CAGR) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial value left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Compound Annual Growth Rate (CAGR) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/nopat', 'name' => 'NOPAT'],
            ['path' => '/finance/net-present-value', 'name' => 'NPV'],
            ['path' => '/finance/nsfr', 'name' => 'NSFR'],
        ],
        'authors' => [],
    ],
];
