<?php

/**
 * Return on sales (ROS)
 * /finance/ros
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Return on sales (ROS)',
    'meta' => ['title' => 'Return on sales (ROS) — Free Online Calculator', 'description' => 'Enter operating profit and net sales and get Return on sales (ROS) back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Return on sales (ROS) Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'operating_profit',
                            'label' => 'Operating profit',
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
                            'name' => 'net_sales',
                            'label' => 'Net sales',
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
                            'name' => 'ros',
                            'label' => 'Return on sales (ROS)',
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
            'title' => 'ros = operating_profit/net_sales',
            'results' => ['ros' => 'operating_profit/net_sales', 'net_sales' => 'operating_profit/ros', 'operating_profit' => 'net_sales*ros'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Return on sales (ROS) turns Operating profit and Net sales into Return on sales (ROS). There is no hidden constant here: change return on sales (ROS) and operating profit moves with it. The main result, Return on sales (ROS), is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Return on sales (ROS) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Return on sales (ROS): it takes 2 numbers and reports Return on sales (ROS).</p><p>Written with the labels from the form, Return on sales (ROS) = Operating profit ÷ Net sales.</p><p>What comes back is Return on sales (ROS) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Operating profit</strong> — in USD</li><li><strong>Net sales</strong> — in USD</li></ul><p>The result box is Return on sales (ROS) in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Operating profit = 10 USD and Net sales = 100 USD gives <strong>Return on sales (ROS)</strong> = 0.1 perc.</p><ul><li><strong>Return on sales (ROS)</strong> = 0.1 perc</li></ul><p>The line behind those figures is <strong>Return on sales (ROS)</strong> = <code>Operating profit ÷ Net sales</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Return on sales (ROS)</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Return on sales (ROS) offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Return on sales (ROS)</strong> = <code>Operating profit ÷ Net sales</code></li><li><strong>Net sales</strong> = <code>Operating profit ÷ Return on sales (ROS)</code></li><li><strong>Operating profit</strong> = <code>Net sales × Return on sales (ROS)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Return on sales (ROS)</strong> = <code>Operating profit ÷ Net sales</code> — the form to use when Operating profit and Net sales are the values you have.</li><li><strong>Net sales</strong> = <code>Operating profit ÷ Return on sales (ROS)</code> — the form to use when Operating profit and Return on sales (ROS) are the values you have.</li><li><strong>Operating profit</strong> = <code>Net sales × Return on sales (ROS)</code> — the form to use when Net sales and Return on sales (ROS) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Return on sales (ROS), Net sales and Operating profit can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Operating profit from 10 to 20, leaving every other box alone. The panel moves from <strong>Return on sales (ROS)</strong> 0.1 perc to <strong>Return on sales (ROS)</strong> 0.2 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Return on sales (ROS) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Operating profit left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Operating profit is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Net sales left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net sales is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Operating profit and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Return on sales (ROS) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Operating profit</strong> takes a plain number with no unit attached. It feeds Return on sales (ROS) and Net sales. Fill it from a measurement rather than a memory — Operating profit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Net sales</strong> takes a plain number with no unit attached. It feeds Return on sales (ROS) and Operating profit. Fill it from a measurement rather than a memory — Net sales is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Return on sales (ROS)</strong> is a percent figure and the page's own defaults put it at 0.1 perc. It is worked out from Operating profit and Net sales. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Return on sales (ROS)</th></tr></thead><tbody><tr><td><strong>Operating profit</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Net sales</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Operating profit sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Operating profit = 5 USD and Net sales = 50 USD and the page reports <strong>Return on sales (ROS)</strong> = 0.1 perc.</li><li>Feed in Operating profit = 30 USD and Net sales = 100 USD and the page reports <strong>Return on sales (ROS)</strong> = 0.3 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Return on sales (ROS) actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Operating profit and Net sales ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Operating profit — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Return on sales (ROS) in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Return on sales (ROS) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Operating profit and Net sales are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Operating profit and Net sales and the number you are missing is Return on sales (ROS).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/wedding-budget">Wedding budget Calculator</a>, <a href="/finance/week-over-week">Week over week Calculator</a> and <a href="/finance/weekly-pay">Weekly pay Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Return on sales (ROS) calculator work out?', 'a' => 'Return on sales (ROS), from Operating profit and Net sales. The relationship is Return on sales (ROS) = Operating profit ÷ Net sales.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Operating profit (USD), Net sales (USD). With operating profit and net sales in place, Return on sales (ROS) can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Return on sales (ROS), Net sales and Operating profit can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Return on sales (ROS) = 0.1 perc. The figures come from Operating profit as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Return on sales (ROS) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Operating profit blank and the page solves for it, reporting Return on sales (ROS) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Return on sales (ROS) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/wedding-budget', 'name' => 'Wedding budget Calculator'],
            ['path' => '/finance/week-over-week', 'name' => 'Week over week Calculator'],
            ['path' => '/finance/weekly-pay', 'name' => 'Weekly pay Calculator'],
        ],
        'authors' => [],
    ],
];
