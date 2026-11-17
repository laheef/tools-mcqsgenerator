<?php

/**
 * Year over year growth
 * /finance/year-over-year-growth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Year over year growth',
    'meta' => ['title' => 'Year over year growth Calculator: Free, With Steps', 'description' => 'Year over year growth works out year-over-year % change and CAGR (compound annualized growth rate) from value in initial year and value in final year.', 'h1' => 'Year over year growth Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Year-over-year growth',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year_1',
                            'label' => 'Value in initial year',
                            'type' => 'number',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'year_2',
                            'label' => 'Value in final year',
                            'type' => 'number',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent_increase_or_decrease_y',
                            'label' => 'Year-over-year % change',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Calculate CAGR (compound annualized growth rate)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_value',
                            'label' => 'Value in initial year',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_value',
                            'label' => 'Value in final year',
                            'type' => 'number',
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
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'growth_rate',
                            'label' => 'CAGR (compound annualized growth rate)',
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
                            'name' => 'difference',
                            'label' => 'Difference',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
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
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Check out how to use the year-over-year growth calculator.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'percent_increase_or_decrease_y = ((year_2 / year_1) -1) * 100',
            'results' => ['year_1' => '100*year_2/(percent_increase_or_decrease_y + 100)', 'year_2' => '(1/100)*year_1*(percent_increase_or_decrease_y + 100)', 'percent_increase_or_decrease_y' => '-100 + 100*year_2/year_1'],
        ],
        [
            'title' => '100*((final_value/ initial_value )^(1/number_of_periods) -1 ) = growth_rate',
            'results' => ['final_value' => 'initial_value*pow((1/100)*growth_rate + 1, number_of_periods)', 'initial_value' => 'pow(100, number_of_periods)*final_value*pow(growth_rate + 100, -number_of_periods)', 'number_of_periods' => 'log(final_value/initial_value)/log((1/100)*growth_rate + 1)', 'growth_rate' => '100*pow(final_value/initial_value, 1/number_of_periods) - 100'],
        ],
        [
            'title' => 'difference = final_value - initial_value',
            'results' => ['final_value' => 'difference + initial_value', 'initial_value' => '-difference + final_value', 'difference' => 'final_value - initial_value'],
        ],
        [
            'title' => 'total_growth = 100* difference/initial_value',
            'results' => ['total_growth' => '100*difference/initial_value', 'initial_value' => '100*difference/total_growth', 'difference' => '(1/100)*initial_value*total_growth'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Year over year growth works in both directions, between year-over-year % change and value in initial year. Year-over-year % change comes back in % unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Year over year growth calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Year over year growth: it takes 2 numbers and reports Year-over-year % change, Value in initial year and Value in final year.</p><p>Written with the labels from the form, Year-over-year % change = − 100 + 100 × Value in final year ÷ Value in initial year.</p><p>What comes back is Year-over-year % change, Value in initial year, Value in final year and Number of periods — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Value in initial year</strong> — a plain number, no unit</li><li><strong>Value in final year</strong> — a plain number, no unit</li></ul><p>The answers come back as Year-over-year % change in %, Value in initial year, Value in final year, Number of periods, CAGR (compound annualized growth rate) in %, Difference, Total growth in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Value in initial year = 10, Value in final year = 100, Value in initial year = 1000, Value in final year = 10, Number of periods = 100, CAGR (compound annualized growth rate) = 1000 %, Difference = 10 and Total growth = 100 % gives <strong>Year-over-year % change</strong> = 900 %.</p><ul><li><strong>Year-over-year % change</strong> = 900 %</li></ul><p>That is <strong>Year-over-year % change</strong> = <code>− 100 + 100 × Value in final year ÷ Value in initial year</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Year-over-year % change</strong> = 900 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Year-over-year % change takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Year-over-year % change</strong> = <code>− 100 + 100 × Value in final year ÷ Value in initial year</code></li><li><strong>Value in initial year</strong> = <code>100 × Value in final year ÷ (Year-over-year % change + 100)</code></li><li><strong>Value in final year</strong> = <code>(1 ÷ 100) × Value in initial year × (Year-over-year % change + 100)</code></li><li><strong>Number of periods</strong> = <code>ln(Value in final year ÷ Value in initial year) ÷ ln((1 ÷ 100) × CAGR (compound annualized growth rate) + 1)</code></li><li><strong>CAGR (compound annualized growth rate)</strong> = <code>100 × (Value in final year ÷ Value in initial year)^(1 ÷ Number of periods) − 100</code></li><li><strong>Difference</strong> = <code>Value in final year − Value in initial year</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Year-over-year % change</strong> = <code>− 100 + 100 × Value in final year ÷ Value in initial year</code> — the form to use when Value in final year and Value in initial year are the values you have.</li><li><strong>Value in initial year</strong> = <code>100 × Value in final year ÷ (Year-over-year % change + 100)</code> — the form to use when Value in final year and Year-over-year % change are the values you have.</li><li><strong>Value in final year</strong> = <code>(1 ÷ 100) × Value in initial year × (Year-over-year % change + 100)</code> — the form to use when Value in initial year and Year-over-year % change are the values you have.</li><li><strong>Value in final year</strong> = <code>Value in initial year × ((1 ÷ 100) × CAGR (compound annualized growth rate) + 1)^(Number of periods)</code> — the form to use when Value in initial year, CAGR (compound annualized growth rate) and Number of periods are the values you have.</li><li><strong>Value in initial year</strong> = <code>(100)^(Number of periods) × Value in final year × (CAGR (compound annualized growth rate) + 100)^(− Number of periods)</code> — the form to use when Number of periods, Value in final year and CAGR (compound annualized growth rate) are the values you have.</li><li><strong>Number of periods</strong> = <code>ln(Value in final year ÷ Value in initial year) ÷ ln((1 ÷ 100) × CAGR (compound annualized growth rate) + 1)</code> — the form to use when Value in final year, Value in initial year and CAGR (compound annualized growth rate) are the values you have.</li><li><strong>CAGR (compound annualized growth rate)</strong> = <code>100 × (Value in final year ÷ Value in initial year)^(1 ÷ Number of periods) − 100</code> — the form to use when Value in final year, Value in initial year and Number of periods are the values you have.</li><li><strong>Difference</strong> = <code>Value in final year − Value in initial year</code> — the form to use when Value in final year and Value in initial year are the values you have.</li></ul><p>Any one of Year-over-year % change, Value in initial year and Value in final year can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Value in initial year, from 10 to 20 — and the answers go from <strong>Year-over-year % change</strong> 900 % to <strong>Year-over-year % change</strong> 400 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Year-over-year % change, Value in initial year and Value in final year are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Value in initial year left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Value in initial year is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Value in final year left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Value in final year is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Value in initial year to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Year over year growth form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Value in initial year</strong> takes a plain number with no unit attached. It feeds Value in final year and Year-over-year % change. Fill it from a measurement rather than a memory — Value in initial year is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Value in final year</strong> takes a plain number with no unit attached. It feeds Value in initial year and Year-over-year % change. Fill it from a measurement rather than a memory — Value in final year is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Year-over-year % change</strong> is a plain number and the page's own defaults put it at 900. It is computed from Value in final year and Value in initial year, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Value in initial year</strong> is a plain number. It is computed from Number of periods, Value in final year and CAGR (compound annualized growth rate), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Value in final year</strong> is a plain number. It is computed from Value in initial year, CAGR (compound annualized growth rate) and Number of periods, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Number of periods</strong> is a plain number. It is computed from Value in final year, Value in initial year and CAGR (compound annualized growth rate), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>CAGR (compound annualized growth rate)</strong> is a plain number. It is computed from Value in final year, Value in initial year and Number of periods, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Difference</strong> is a plain number. It is computed from Value in final year and Value in initial year, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total growth</strong> is a plain number. It is computed from Difference and Value in initial year, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Year-over-year % change</th></tr></thead><tbody><tr><td><strong>Value in initial year</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Value in final year</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Value in initial year</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Value in final year</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of periods</strong> +10%</td><td>+0%</td></tr><tr><td><strong>CAGR (compound annualized growth rate)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Difference</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total growth</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Value in final year sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. By contrast, Value in initial year, Value in final year and Number of periods barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Value in initial year = 5, Value in final year = 50, Value in initial year = 500, Value in final year = 5, Number of periods = 50, CAGR (compound annualized growth rate) = 500 %, Difference = 5 and Total growth = 50 % and the page reports <strong>Year-over-year % change</strong> = 900 %.</li><li>Feed in Value in initial year = 30, Value in final year = 100, Value in initial year = 1000, Value in final year = 10, Number of periods = 100, CAGR (compound annualized growth rate) = 1000 %, Difference = 10 and Total growth = 100 % and the page reports <strong>Year-over-year % change</strong> = 233 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Year-over-year % change is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Value in initial year and Value in final year measured, Year-over-year % change and Value in initial year wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/price-per-share">Price per share Calculator</a>, <a href="/finance/price-per-sqft">Price per square foot Calculator</a> and <a href="/finance/price-per-square-meter">Price per square meter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Year over year growth calculator work out?', 'a' => <<<'TXT'
            Year-over-year % change, Value in initial year, Value in final year and Number of periods, from Value in final year and Value in initial year. The relationship is Year-over-year % change = − 100 + 100 × Value in final year ÷ Value in initial year.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Value in initial year, Value in final year. With value in initial year and value in final year in place, Year-over-year % change can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Year-over-year % change, Value in initial year, Value in final year and Value in final year blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Year-over-year % change = 900 %. That comes from the page\'s own defaults, entered in Value in initial year; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Year-over-year % change is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Value in initial year blank and the page solves for it, reporting Year-over-year % change instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Year-over-year % change keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/price-per-share', 'name' => 'Price per share Calculator'],
            ['path' => '/finance/price-per-sqft', 'name' => 'Price per square foot Calculator'],
            ['path' => '/finance/price-per-square-meter', 'name' => 'Price per square meter Calculator'],
        ],
        'authors' => [],
    ],
];
