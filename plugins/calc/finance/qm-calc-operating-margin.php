<?php

/**
 * Operating margin
 * /finance/operating-margin
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Operating margin',
    'meta' => ['title' => 'Operating margin — Formula, Steps & Examples', 'description' => 'Operating margin turns revenue and cost of goods sold into operating income. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Operating margin Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Operating income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue',
                            'label' => 'Revenue',
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
                            'name' => 'cost_of_goods_sold',
                            'label' => 'Cost of goods sold',
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
                            'name' => 'operation_expense',
                            'label' => 'Operating expenses',
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
                            'name' => 'operating_income',
                            'label' => 'Operating income',
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
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'operating_margin',
                            'label' => 'Operating margin',
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
            'title' => 'operating_income = revenue - cost_of_goods_sold - operation_expense ',
            'results' => ['operating_income' => '-cost_of_goods_sold - operation_expense + revenue', 'cost_of_goods_sold' => '-operating_income - operation_expense + revenue', 'operation_expense' => '-cost_of_goods_sold - operating_income + revenue', 'revenue' => 'cost_of_goods_sold + operating_income + operation_expense'],
        ],
        [
            'title' => 'operating_margin = operating_income / revenue ',
            'results' => ['operating_income' => 'operating_margin*revenue', 'operating_margin' => 'operating_income/revenue', 'revenue' => 'operating_income/operating_margin'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Operating margin takes Revenue, Cost of goods sold and Operating expenses and returns Operating income and Operating margin. The arithmetic is the whole method: operating income is worked out from revenue by one formula, applied once. Operating income comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Operating margin calculator works', 'html' => <<<'TXT'
            <p>The Operating margin calculator applies one relationship to 3 numbers and reports Operating income and Operating margin.</p><p>Written with the labels from the form, Operating income = − Cost of goods sold − Operating expenses + Revenue.</p><p>The answers are Operating income and Operating margin; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Revenue</strong> — in USD</li><li><strong>Cost of goods sold</strong> — in USD</li><li><strong>Operating expenses</strong> — in USD</li></ul><p>What you get back is Operating income in USD, Operating margin in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Revenue = 10 USD, Cost of goods sold = 100 USD and Operating expenses = 1000 USD; the answers are <strong>Operating income</strong> = -1090 USD and <strong>Operating margin</strong> = -109 perc.</p><ul><li><strong>Operating income</strong> = -1090 USD</li><li><strong>Operating margin</strong> = -109 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Operating income</strong> = <code>− Cost of goods sold − Operating expenses + Revenue</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Operating income</strong> = -1090 and <strong>Operating margin</strong> = -109 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Operating margin offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Operating income</strong> = <code>− Cost of goods sold − Operating expenses + Revenue</code></li><li><strong>Cost of goods sold</strong> = <code>− Operating income − Operating expenses + Revenue</code></li><li><strong>Operating expenses</strong> = <code>− Cost of goods sold − Operating income + Revenue</code></li><li><strong>Revenue</strong> = <code>Cost of goods sold + Operating income + Operating expenses</code></li><li><strong>Operating margin</strong> = <code>Operating income ÷ Revenue</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Operating income</strong> = <code>− Cost of goods sold − Operating expenses + Revenue</code> — the form to use when Cost of goods sold, Operating expenses and Revenue are the values you have.</li><li><strong>Cost of goods sold</strong> = <code>− Operating income − Operating expenses + Revenue</code> — the form to use when Operating income, Operating expenses and Revenue are the values you have.</li><li><strong>Operating expenses</strong> = <code>− Cost of goods sold − Operating income + Revenue</code> — the form to use when Cost of goods sold, Operating income and Revenue are the values you have.</li><li><strong>Revenue</strong> = <code>Cost of goods sold + Operating income + Operating expenses</code> — the form to use when Cost of goods sold, Operating income and Operating expenses are the values you have.</li><li><strong>Operating margin</strong> = <code>Operating income ÷ Revenue</code> — the form to use when Operating income and Revenue are the values you have.</li><li><strong>Operating income</strong> = <code>Operating margin × Revenue</code> — the form to use when Operating margin and Revenue are the values you have.</li><li><strong>Revenue</strong> = <code>Operating income ÷ Operating margin</code> — the form to use when Operating income and Operating margin are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Operating income, Cost of goods sold and Operating expenses can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Revenue, from 10 to 20 — and the answers go from <strong>Operating income</strong> -1090 USD and <strong>Operating margin</strong> -109 perc to <strong>Operating income</strong> -1080 USD and <strong>Operating margin</strong> -54 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Operating income and Operating margin are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Revenue left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Revenue is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Cost of goods sold left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cost of goods sold is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Operating expenses left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Operating expenses is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Revenue to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Operating margin form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Revenue</strong> takes a plain number with no unit attached. It feeds Operating income, Cost of goods sold and Operating expenses. Fill it from a measurement rather than a memory — Revenue is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost of goods sold</strong> takes a plain number with no unit attached. It feeds Operating income, Operating expenses and Revenue. Fill it from a measurement rather than a memory — Cost of goods sold is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Operating expenses</strong> takes a plain number with no unit attached. It feeds Operating income, Cost of goods sold and Revenue. Fill it from a measurement rather than a memory — Operating expenses is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Operating income</strong> is a plain number and the page's own defaults put it at -1090. It is computed from Cost of goods sold, Operating expenses and Revenue, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Operating margin</strong> is a percent figure and the page's own defaults put it at -109 perc. It is computed from Operating income and Revenue, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Operating income</th><th>Operating margin</th></tr></thead><tbody><tr><td><strong>Revenue</strong> +10%</td><td>+0.09%</td><td>+9.17%</td></tr><tr><td><strong>Cost of goods sold</strong> +10%</td><td>-0.92%</td><td>-0.92%</td></tr><tr><td><strong>Operating expenses</strong> +10%</td><td>-9.17%</td><td>-9.17%</td></tr></tbody></table><p>Ranked by leverage, Revenue sits at the top — a ten per cent error in that box shows up as roughly 9.2 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Revenue = 5 USD, Cost of goods sold = 50 USD and Operating expenses = 500 USD and the page reports <strong>Operating income</strong> = -545 USD and <strong>Operating margin</strong> = -109 perc.</li><li>Feed in Revenue = 30 USD, Cost of goods sold = 100 USD and Operating expenses = 1000 USD and the page reports <strong>Operating income</strong> = -1070 USD and <strong>Operating margin</strong> = -35.67 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Operating margin actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Operating income follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Revenue, Cost of goods sold and Operating expenses are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Revenue, Cost of goods sold and Operating expenses and the number you are missing is Operating income and Operating margin.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/blended-rate">Blended rate Calculator</a>, <a href="/finance/boat-loan">Boat loan</a> and <a href="/finance/bond-convexity">Bond convexity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Operating margin calculator work out?', 'a' => <<<'TXT'
            Operating income and Operating margin, from Cost of goods sold, Operating expenses and Revenue. The relationship is Operating income = − Cost of goods sold − Operating expenses + Revenue.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Revenue (USD), Cost of goods sold (USD), Operating expenses (USD). Enter revenue, cost of goods sold and operating expenses; Operating income is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Operating income, Cost of goods sold, Operating expenses and Revenue can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Operating income = -1090 USD and Operating margin = -109 perc. That comes from the page's own defaults, entered in Revenue; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Operating income is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Revenue blank and the page solves for it, reporting Operating income instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Operating income at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/blended-rate', 'name' => 'Blended rate Calculator'],
            ['path' => '/finance/boat-loan', 'name' => 'Boat loan'],
            ['path' => '/finance/bond-convexity', 'name' => 'Bond convexity'],
        ],
        'authors' => [],
    ],
];
