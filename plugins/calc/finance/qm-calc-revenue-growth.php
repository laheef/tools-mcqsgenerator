<?php

/**
 * Revenue growth
 * /finance/revenue-growth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Revenue growth',
    'meta' => ['title' => 'Revenue growth Calculator — Formula, Units & Example', 'description' => 'Revenue growth turns initial value revenue and final value revenue into total growth in revenue. Every box can be solved for, not only the one in the title.', 'h1' => 'Revenue growth Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'initial_value1 == 5000 and total_growth == 20', 'text' => 'Onim Example 1: If your company has an initial revenue of $5,000 and a 20% total growth, what will be the final value of your revenue?&nbsp;'],
                                ['when' => 'initial_value == 20000 and number_of_periods == 5 and growth_rate == 15', 'text' => 'Onim Example 2: If your company has an initial revenue of $20,000 and a 15% annual growth rate, what will be the final value of your revenue after 5 years?'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Revenue growth',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_value1',
                            'label' => 'Initial value revenue',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_value1',
                            'label' => 'Final value revenue',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_growth',
                            'label' => 'Total growth in revenue',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Revenue growth rate',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_value',
                            'label' => 'Initial value revenue',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_value',
                            'label' => 'Final value revenue',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
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
                            'help' => 'Number of full years (for example, 1st Jan 2020 until 1st Jan 2024 is 4 full calendar years).',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'growth_rate',
                            'label' => 'Revenue growth rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Compound Annual Growth Rate.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'initial_value1 == 5000 and total_growth == 20', 'text' => <<<'TXT'
                                How the result is calculated: Transform the total growth percentage into decimals: perc&nbsp;=&nbsp;20/100&nbsp;=&nbsp;0.20 Substitute this value and the initial revenue in the formula: Finalrev&nbsp;=&nbsp;(perc&nbsp;+&nbsp;1)&nbsp;×&nbsp;Initialrev The final revenue is: $6,000.&nbsp;
                                TXT],
                                ['when' => 'initial_value == 20000 and number_of_periods == 5 and growth_rate == 15', 'text' => <<<'TXT'
                                How the result is calculated: Transform the annual growth rate into decimals: perc&nbsp;=&nbsp;15/100&nbsp;=&nbsp;0.15 Substitute this value, the period, and the initial revenue in the formula: Finalrev&nbsp;=&nbsp;(perc&nbsp;+&nbsp;1)period&nbsp;×&nbsp;Initialrev The final revenue is: $40,227.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Check our examples: Example 1 ⧉ — final revenue after 20% of total growth Example 2 ⧉ — final revenue after 5 years'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => '100*((final_value/ initial_value )^(1/number_of_periods) -1 ) = growth_rate',
            'results' => ['initial_value' => 'pow(100, number_of_periods)*final_value*pow(growth_rate + 100, -number_of_periods)', 'growth_rate' => '100*pow(final_value/initial_value, 1/number_of_periods) - 100', 'number_of_periods' => 'log(final_value/initial_value)/log((1/100)*growth_rate + 1)', 'final_value' => 'initial_value*pow((1/100)*growth_rate + 1, number_of_periods)'],
        ],
        [
            'title' => 'total_growth = 100 * (final_value1 - initial_value1)/initial_value1',
            'results' => ['total_growth' => '100*final_value1/initial_value1 - 100', 'final_value1' => '(1/100)*initial_value1*(total_growth + 100)', 'initial_value1' => '100*final_value1/(total_growth + 100)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Revenue growth converts between total growth in revenue and initial value revenue: put a value in either box and the other one is worked out. Total growth in revenue is opened in %; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Revenue growth calculator works', 'html' => <<<'TXT'
            <p>The Revenue growth calculator applies one relationship to 2 numbers and reports Total growth in revenue, Initial value revenue and Final value revenue.</p><p>In the form&#039;s own words, Initial value revenue = (100)^(Number of periods) × Final value revenue × (Revenue growth rate + 100)^(− Number of periods).</p><p>What comes back is Total growth in revenue, Initial value revenue, Final value revenue and Number of periods — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Initial value revenue</strong> — in USD</li><li><strong>Final value revenue</strong> — in USD</li></ul><p>What you get back is Total growth in revenue in %, Initial value revenue in USD, Final value revenue in USD, Number of periods, Revenue growth rate in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Initial value revenue = 10 USD, Final value revenue = 100 USD, Initial value revenue = 1000 USD, Final value revenue = 10 USD, Number of periods = 100 and Revenue growth rate = 1000 % gives <strong>Total growth in revenue</strong> = 900 %.</p><ul><li><strong>Total growth in revenue</strong> = 900 %</li></ul><p>That is <strong>Initial value revenue</strong> = <code>(100)^(Number of periods) × Final value revenue × (Revenue growth rate + 100)^(− Number of periods)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Total growth in revenue</strong> = 900 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Total growth in revenue takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Initial value revenue</strong> = <code>(100)^(Number of periods) × Final value revenue × (Revenue growth rate + 100)^(− Number of periods)</code></li><li><strong>Revenue growth rate</strong> = <code>100 × (Final value revenue ÷ Initial value revenue)^(1 ÷ Number of periods) − 100</code></li><li><strong>Number of periods</strong> = <code>ln(Final value revenue ÷ Initial value revenue) ÷ ln((1 ÷ 100) × Revenue growth rate + 1)</code></li><li><strong>Final value revenue</strong> = <code>Initial value revenue × ((1 ÷ 100) × Revenue growth rate + 1)^(Number of periods)</code></li><li><strong>Total growth in revenue</strong> = <code>100 × Final value revenue ÷ Initial value revenue − 100</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Initial value revenue</strong> = <code>(100)^(Number of periods) × Final value revenue × (Revenue growth rate + 100)^(− Number of periods)</code> — the form to use when Number of periods, Final value revenue and Revenue growth rate are the values you have.</li><li><strong>Revenue growth rate</strong> = <code>100 × (Final value revenue ÷ Initial value revenue)^(1 ÷ Number of periods) − 100</code> — the form to use when Final value revenue, Initial value revenue and Number of periods are the values you have.</li><li><strong>Number of periods</strong> = <code>ln(Final value revenue ÷ Initial value revenue) ÷ ln((1 ÷ 100) × Revenue growth rate + 1)</code> — the form to use when Final value revenue, Initial value revenue and Revenue growth rate are the values you have.</li><li><strong>Final value revenue</strong> = <code>Initial value revenue × ((1 ÷ 100) × Revenue growth rate + 1)^(Number of periods)</code> — the form to use when Initial value revenue, Revenue growth rate and Number of periods are the values you have.</li><li><strong>Total growth in revenue</strong> = <code>100 × Final value revenue ÷ Initial value revenue − 100</code> — the form to use when Final value revenue and Initial value revenue are the values you have.</li><li><strong>Final value revenue</strong> = <code>(1 ÷ 100) × Initial value revenue × (Total growth in revenue + 100)</code> — the form to use when Initial value revenue and Total growth in revenue are the values you have.</li><li><strong>Initial value revenue</strong> = <code>100 × Final value revenue ÷ (Total growth in revenue + 100)</code> — the form to use when Final value revenue and Total growth in revenue are the values you have.</li></ul><p>Any one of Initial value revenue, Revenue growth rate and Number of periods can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Initial value revenue, from 10 to 20 — and the answers go from <strong>Total growth in revenue</strong> 900 % to <strong>Total growth in revenue</strong> 400 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total growth in revenue, Initial value revenue and Final value revenue are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Initial value revenue left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial value revenue is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Final value revenue left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Final value revenue is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial value revenue is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Revenue growth form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial value revenue</strong> takes a plain number with no unit attached. Change it and Total growth in revenue and Final value revenue changes with it. Fill it from a measurement rather than a memory — Initial value revenue is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Final value revenue</strong> takes a plain number with no unit attached. Change it and Total growth in revenue and Initial value revenue changes with it. Fill it from a measurement rather than a memory — Final value revenue is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Total growth in revenue</strong> is a plain number and the page's own defaults put it at 900. It is worked out from Final value revenue and Initial value revenue. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Initial value revenue</strong> is a plain number. It is worked out from Number of periods, Final value revenue and Revenue growth rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Final value revenue</strong> is a plain number. It is worked out from Initial value revenue, Revenue growth rate and Number of periods. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Number of periods</strong> is a plain number. It is worked out from Final value revenue, Initial value revenue and Revenue growth rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Revenue growth rate</strong> is a plain number. It is worked out from Final value revenue, Initial value revenue and Number of periods. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total growth in revenue</th></tr></thead><tbody><tr><td><strong>Initial value revenue</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Final value revenue</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Initial value revenue</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Final value revenue</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of periods</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Revenue growth rate</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Final value revenue sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. By contrast, Initial value revenue, Final value revenue and Number of periods barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Initial value revenue = 5 USD, Final value revenue = 50 USD, Initial value revenue = 500 USD, Final value revenue = 5 USD, Number of periods = 50 and Revenue growth rate = 500 % and the page reports <strong>Total growth in revenue</strong> = 900 %.</li><li>Feed in Initial value revenue = 30 USD, Final value revenue = 100 USD, Initial value revenue = 1000 USD, Final value revenue = 10 USD, Number of periods = 100 and Revenue growth rate = 1000 % and the page reports <strong>Total growth in revenue</strong> = 233 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Total growth in revenue is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial value revenue and Final value revenue are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Initial value revenue and Final value revenue is what you already know and Total growth in revenue and Initial value revenue is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/rule-of-72">Rule of 72</a>, <a href="/finance/rv-loan">RV loan Calculator</a> and <a href="/finance/saas-ltv">SaaS lifetime value Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Revenue growth calculator work out?', 'a' => <<<'TXT'
            Total growth in revenue, Initial value revenue, Final value revenue and Number of periods, from Number of periods, Final value revenue and Revenue growth rate. The relationship is Initial value revenue = (100)^(Number of periods) × Final value revenue × (Revenue growth rate + 100)^(− Number of periods).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial value revenue (USD), Final value revenue (USD). With initial value revenue and final value revenue in place, Total growth in revenue can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Initial value revenue, Revenue growth rate, Number of periods and Final value revenue blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total growth in revenue = 900 %. The figures come from Initial value revenue as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Total growth in revenue is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial value revenue blank and the page solves for it, reporting Total growth in revenue instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total growth in revenue keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/rule-of-72', 'name' => 'Rule of 72'],
            ['path' => '/finance/rv-loan', 'name' => 'RV loan Calculator'],
            ['path' => '/finance/saas-ltv', 'name' => 'SaaS lifetime value Calculator'],
        ],
        'authors' => [],
    ],
];
