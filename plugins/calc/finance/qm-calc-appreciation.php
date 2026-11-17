<?php

/**
 * Appreciation
 * /finance/appreciation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Appreciation',
    'meta' => ['title' => 'Appreciation Calculator — Formula & Results', 'description' => 'Appreciation reports final value. Results come back in USD, with any other unit a click away. Every box can be solved for, not only the one in the title.', 'h1' => 'Appreciation Calculator', 'updated' => '2026-10-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'starting_value',
                            'label' => 'Starting value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'appreciation_rate',
                            'label' => 'Appreciation rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'appreciation_rate_period',
                            'label' => 'Appreciation rate period',
                            'type' => 'select',
                            'options' => ['Daily' => '30', 'Monthly' => '1', 'Yearly' => '0.08333333333333'],
                            'default' => 'Monthly',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'period',
                            'label' => 'Period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
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
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'If you want to calculate depreciation, use a negative appreciation rate or try the depreciation calculator.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'final_value = starting_value * ((appreciation_rate/100) + 1) ^ (appreciation_rate_period * period)',
            'results' => [
                'appreciation_rate' => 'pow(pow(100, appreciation_rate_period*period)*final_value/starting_value, 1/(appreciation_rate_period*period)) - 100',
                'starting_value' => 'pow(100, appreciation_rate_period*period)*final_value*pow(appreciation_rate + 100, -appreciation_rate_period*period)',
                'final_value' => 'starting_value*pow((1/100)*appreciation_rate + 1, appreciation_rate_period*period)',
                'period' => '-log(starting_value/final_value)/(appreciation_rate_period*log((1/100)*appreciation_rate + 1))',
                'appreciation_rate_period' => '-log(starting_value/final_value)/(period*log((1/100)*appreciation_rate + 1))',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Appreciation turns Starting value, Appreciation rate and Appreciation rate period into Final value. Nothing is looked up on this page: final value is computed from starting value and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Final value is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Appreciation calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Appreciation: it takes 4 numbers and reports Final value.</p><p>Written with the labels from the form, Final value = Starting value × ((1 ÷ 100) × Appreciation rate + 1)^(Appreciation rate period × Period).</p><p>The result panel carries Final value, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Starting value</strong> — in USD</li><li><strong>Appreciation rate</strong> — in %</li><li><strong>Appreciation rate period</strong> — a plain number, no unit</li><li><strong>Period</strong> — in years / months</li></ul><p>What you get back is Final value in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Starting value = 10000 USD, Appreciation rate = 100 %, Appreciation rate period = 1 and Period = 1000 yrsmos gives <strong>Final value</strong> = 1.072e+305 USD.</p><ul><li><strong>Final value</strong> = 1.072e+305 USD</li></ul><p>That is <strong>Final value</strong> = <code>Starting value × ((1 ÷ 100) × Appreciation rate + 1)^(Appreciation rate period × Period)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Final value</strong> = 1.072e+305 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Period offers 9 units and opens on years / months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Final value</strong> = <code>Starting value × ((1 ÷ 100) × Appreciation rate + 1)^(Appreciation rate period × Period)</code></li><li><strong>Appreciation rate</strong> = <code>((100)^(Appreciation rate period × Period) × Final value ÷ Starting value)^(1 ÷ (Appreciation rate period × Period)) − 100</code></li><li><strong>Starting value</strong> = <code>(100)^(Appreciation rate period × Period) × Final value × (Appreciation rate + 100)^(− Appreciation rate period × Period)</code></li><li><strong>Period</strong> = <code>− ln(Starting value ÷ Final value) ÷ (Appreciation rate period × ln((1 ÷ 100) × Appreciation rate + 1))</code></li><li><strong>Appreciation rate period</strong> = <code>− ln(Starting value ÷ Final value) ÷ (Period × ln((1 ÷ 100) × Appreciation rate + 1))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Final value</strong> = <code>Starting value × ((1 ÷ 100) × Appreciation rate + 1)^(Appreciation rate period × Period)</code> — the form to use when Starting value, Appreciation rate, Appreciation rate period and Period are the values you have.</li><li><strong>Appreciation rate</strong> = <code>((100)^(Appreciation rate period × Period) × Final value ÷ Starting value)^(1 ÷ (Appreciation rate period × Period)) − 100</code> — the form to use when Appreciation rate period, Period, Final value and Starting value are the values you have.</li><li><strong>Starting value</strong> = <code>(100)^(Appreciation rate period × Period) × Final value × (Appreciation rate + 100)^(− Appreciation rate period × Period)</code> — the form to use when Appreciation rate period, Period, Final value and Appreciation rate are the values you have.</li><li><strong>Period</strong> = <code>− ln(Starting value ÷ Final value) ÷ (Appreciation rate period × ln((1 ÷ 100) × Appreciation rate + 1))</code> — the form to use when Starting value, Final value, Appreciation rate period and Appreciation rate are the values you have.</li><li><strong>Appreciation rate period</strong> = <code>− ln(Starting value ÷ Final value) ÷ (Period × ln((1 ÷ 100) × Appreciation rate + 1))</code> — the form to use when Starting value, Final value, Period and Appreciation rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Final value, Appreciation rate and Starting value can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Starting value, from 10000 to 20000 — and the answers go from <strong>Final value</strong> 1.072e+305 USD to <strong>Final value</strong> 2.143e+305 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Period is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Final value is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Starting value left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Starting value is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Appreciation rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Appreciation rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Starting value and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Appreciation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Starting value</strong> takes a plain number with no unit attached. The page reads it when it works out Appreciation rate, Final value and Period. Fill it from a measurement rather than a memory — Starting value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Appreciation rate</strong> is measured in %. The page reads it when it works out Starting value, Final value and Period. Fill it from a measurement rather than a memory — Appreciation rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Appreciation rate period</strong> takes a plain number with no unit attached. The page reads it when it works out Appreciation rate, Starting value and Final value. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Appreciation rate period is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Period</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. The page reads it when it works out Appreciation rate, Starting value and Final value. Fill it from a measurement rather than a memory — Period is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Final value</strong> is a plain number and the page's own defaults put it at 1.072e+305. It is computed from Starting value, Appreciation rate, Appreciation rate period and Period, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Final value</th></tr></thead><tbody><tr><td><strong>Starting value</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Appreciation rate</strong> +10%</td><td>—</td></tr><tr><td><strong>Appreciation rate period</strong> +10%</td><td>—</td></tr><tr><td><strong>Period</strong> +10%</td><td>—</td></tr></tbody></table><p>Ranked by leverage, Starting value sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Appreciation rate, Appreciation rate period and Period barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Starting value = 5000 USD, Appreciation rate = 50 %, Appreciation rate period = 0.5 and Period = 500 yrsmos and the page reports <strong>Final value</strong> = 5.270e+47 USD.</li><li>Feed in Starting value = 30000 USD, Appreciation rate = 100 %, Appreciation rate period = 1 and Period = 1000 yrsmos and the page reports <strong>Final value</strong> = 3.215e+305 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Appreciation actually offers.</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Final value is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Starting value, Appreciation rate and Appreciation rate period measured, Final value wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/ffo">Funds from operation (FFO) Calculator</a>, <a href="/finance/future-salary">Future salary Calculator</a> and <a href="/finance/annuity-future-value">Future value of annuity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Appreciation calculator work out?', 'a' => <<<'TXT'
            Final value, from Starting value, Appreciation rate, Appreciation rate period and Period. The relationship is Final value = Starting value × ((1 ÷ 100) × Appreciation rate + 1)^(Appreciation rate period × Period).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Starting value (USD), Appreciation rate (%), Appreciation rate period, Period (years / months). Fill starting value, appreciation rate and appreciation rate period and leave Final value empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Final value, Appreciation rate, Starting value and Period can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Final value = 1.072e+305 USD. That comes from the page\'s own defaults, entered in Starting value; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Final value is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Starting value blank and the page solves for it, reporting Final value instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Final value at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/ffo', 'name' => 'Funds from operation (FFO) Calculator'],
            ['path' => '/finance/future-salary', 'name' => 'Future salary Calculator'],
            ['path' => '/finance/annuity-future-value', 'name' => 'Future value of annuity'],
        ],
        'authors' => [],
    ],
];
