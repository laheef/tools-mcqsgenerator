<?php

/**
 * Rent increase
 * /finance/rent-increase
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rent increase',
    'meta' => ['title' => 'Rent increase Calculator — Formula & Results', 'description' => 'Rent increase takes current annual rent, average rent change per year and number of years and returns expected future annual rent. Every figure is computed.', 'h1' => 'Rent increase Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_rent',
                            'label' => 'Current annual rent',
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
                            'name' => 'avg_increase',
                            'label' => 'Average rent change per year',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_years',
                            'label' => 'Number of years',
                            'type' => 'number',
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
                            'name' => 'future_rent',
                            'label' => 'Expected future annual rent',
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
            'title' => 'future_rent = current_rent * (1 + avg_increase) ^ num_years',
            'results' => ['current_rent' => 'future_rent*pow(avg_increase + 1, -num_years)', 'future_rent' => 'current_rent*pow(avg_increase + 1, num_years)', 'avg_increase' => 'pow(future_rent/current_rent, 1/num_years) - 1', 'num_years' => 'log(future_rent/current_rent)/log(avg_increase + 1)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Rent increase turns Current annual rent, Average rent change per year and Number of years into Expected future annual rent. It is a single relationship that reads expected future annual rent out of current annual rent, not a table of canned results keyed by them. Units for Expected future annual rent default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Rent increase calculator works', 'html' => <<<'TXT'
            <p>Rent increase answers one question from 3 numbers, and the answer is Expected future annual rent.</p><p>The relationship it solves reads Expected future annual rent = Current annual rent × (Average rent change per year + 1)^(Number of years).</p><p>The result panel carries Expected future annual rent, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Current annual rent</strong> — in USD</li><li><strong>Average rent change per year</strong> — in percent</li><li><strong>Number of years</strong> — in years</li></ul><p>The result box is Expected future annual rent in USD. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Current annual rent = 10 USD, Average rent change per year = 100 perc and Number of years = 1000 yrs — through the same formula and the panel reports <strong>Expected future annual rent</strong> = 10 USD.</p><ul><li><strong>Expected future annual rent</strong> = 10 USD</li></ul><p>The line behind those figures is <strong>Expected future annual rent</strong> = <code>Current annual rent × (Average rent change per year + 1)^(Number of years)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Expected future annual rent</strong> = 10 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Average rent change per year offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Expected future annual rent</strong> = <code>Current annual rent × (Average rent change per year + 1)^(Number of years)</code></li><li><strong>Current annual rent</strong> = <code>Expected future annual rent × (Average rent change per year + 1)^(− Number of years)</code></li><li><strong>Average rent change per year</strong> = <code>(Expected future annual rent ÷ Current annual rent)^(1 ÷ Number of years) − 1</code></li><li><strong>Number of years</strong> = <code>ln(Expected future annual rent ÷ Current annual rent) ÷ ln(Average rent change per year + 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Expected future annual rent</strong> = <code>Current annual rent × (Average rent change per year + 1)^(Number of years)</code> — the form to use when Current annual rent, Average rent change per year and Number of years are the values you have.</li><li><strong>Current annual rent</strong> = <code>Expected future annual rent × (Average rent change per year + 1)^(− Number of years)</code> — the form to use when Expected future annual rent, Average rent change per year and Number of years are the values you have.</li><li><strong>Average rent change per year</strong> = <code>(Expected future annual rent ÷ Current annual rent)^(1 ÷ Number of years) − 1</code> — the form to use when Expected future annual rent, Current annual rent and Number of years are the values you have.</li><li><strong>Number of years</strong> = <code>ln(Expected future annual rent ÷ Current annual rent) ÷ ln(Average rent change per year + 1)</code> — the form to use when Expected future annual rent, Current annual rent and Average rent change per year are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Expected future annual rent, Current annual rent and Average rent change per year can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Current annual rent from 10 to 20, leaving every other box alone. The panel moves from <strong>Expected future annual rent</strong> 10 USD to <strong>Expected future annual rent</strong> 20 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Average rent change per year and Number of years is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Expected future annual rent is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Current annual rent left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current annual rent is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Average rent change per year left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average rent change per year is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Current annual rent is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Rent increase form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current annual rent</strong> takes a plain number with no unit attached. It feeds Expected future annual rent, Average rent change per year and Number of years. Fill it from a measurement rather than a memory — Current annual rent is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Average rent change per year</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Current annual rent, Expected future annual rent and Number of years. Fill it from a measurement rather than a memory — Average rent change per year is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of years</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. It feeds Current annual rent, Expected future annual rent and Average rent change per year. Fill it from a measurement rather than a memory — Number of years is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Expected future annual rent</strong> is a plain number and the page's own defaults put it at 10. It is computed from Current annual rent, Average rent change per year and Number of years, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Expected future annual rent</th></tr></thead><tbody><tr><td><strong>Current annual rent</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Average rent change per year</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Number of years</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Current annual rent sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Number of years and Average rent change per year barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Current annual rent = 5 USD, Average rent change per year = 50 perc and Number of years = 500 yrs and the page reports <strong>Expected future annual rent</strong> = 5 USD.</li><li>Feed in Current annual rent = 30 USD, Average rent change per year = 100 perc and Number of years = 1000 yrs and the page reports <strong>Expected future annual rent</strong> = 30 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Rent increase actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Expected future annual rent is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and years and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Current annual rent, Average rent change per year and Number of years are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Current annual rent, Average rent change per year and Number of years is what you already know and Expected future annual rent is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/stock">Stock Calculator</a>, <a href="/finance/stock-split">Stock split Calculator</a> and <a href="/finance/student-loan">Student loan Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rent increase calculator work out?', 'a' => <<<'TXT'
            Expected future annual rent, from Current annual rent, Average rent change per year and Number of years. The relationship is Expected future annual rent = Current annual rent × (Average rent change per year + 1)^(Number of years).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current annual rent (USD), Average rent change per year (percent), Number of years (years). Fill current annual rent, average rent change per year and number of years and leave Expected future annual rent empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Expected future annual rent, Current annual rent, Average rent change per year and Number of years can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Expected future annual rent = 10 USD. That comes from the page's own defaults, entered in Current annual rent; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Expected future annual rent is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Current annual rent blank and the page solves for it, reporting Expected future annual rent instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Expected future annual rent at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/stock', 'name' => 'Stock Calculator'],
            ['path' => '/finance/stock-split', 'name' => 'Stock split Calculator'],
            ['path' => '/finance/student-loan', 'name' => 'Student loan Calculator'],
        ],
        'authors' => [],
    ],
];
