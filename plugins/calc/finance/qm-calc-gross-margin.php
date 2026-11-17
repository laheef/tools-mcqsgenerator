<?php

/**
 * Gross margin
 * /finance/gross-margin
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gross margin',
    'meta' => ['title' => 'Gross margin Calculator — Formula & Results', 'description' => 'Gross margin works out gross profit from revenue and Cost of goods sold (COGS). A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Gross margin Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Gross profit',
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
                            'name' => 'cogs',
                            'label' => 'Cost of goods sold (COGS)',
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
                            'name' => 'gross_profit',
                            'label' => 'Gross profit',
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
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gross_margin',
                            'label' => 'Gross margin',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'gross_margin < 0', 'text' => 'You need to work on improving your gross margin, or your company might go bust!'],
                                ['when' => 'gross_margin == 0', 'text' => 'Your company is breaking even at the top line, but it might be at a loss at the net profit level.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'gross_profit = revenue - cogs ',
            'results' => ['revenue' => 'cogs + gross_profit', 'cogs' => '-gross_profit + revenue', 'gross_profit' => '-cogs + revenue'],
        ],
        [
            'title' => 'gross_margin = gross_profit / revenue',
            'results' => ['revenue' => 'gross_profit/gross_margin', 'gross_margin' => 'gross_profit/revenue', 'gross_profit' => 'gross_margin*revenue'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Gross margin takes Revenue and Cost of goods sold (COGS) and returns Gross profit and Gross margin. It is a single relationship that reads gross profit out of revenue, not a table of canned results keyed by them. Units for Gross profit default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Gross margin calculator works', 'html' => <<<'TXT'
            <p>Gross margin answers one question from 2 numbers, and the answer is Gross profit and Gross margin.</p><p>The relationship it solves reads Gross profit = − Cost of goods sold (COGS) + Revenue.</p><p>The answers are Gross profit and Gross margin; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Revenue</strong> — in USD</li><li><strong>Cost of goods sold (COGS)</strong> — in USD</li></ul><p>The answers come back as Gross profit in USD, Gross margin in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Revenue = 10 USD and Cost of goods sold (COGS) = 100 USD gives <strong>Gross profit</strong> = -90 USD and <strong>Gross margin</strong> = -9 perc.</p><ul><li><strong>Gross profit</strong> = -90 USD</li><li><strong>Gross margin</strong> = -9 perc</li></ul><p>That is <strong>Gross profit</strong> = <code>− Cost of goods sold (COGS) + Revenue</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Gross profit</strong> = -90 and <strong>Gross margin</strong> = -9 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Gross margin offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Gross profit</strong> = <code>− Cost of goods sold (COGS) + Revenue</code></li><li><strong>Revenue</strong> = <code>Cost of goods sold (COGS) + Gross profit</code></li><li><strong>Cost of goods sold (COGS)</strong> = <code>− Gross profit + Revenue</code></li><li><strong>Gross margin</strong> = <code>Gross profit ÷ Revenue</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Gross profit</strong> = <code>− Cost of goods sold (COGS) + Revenue</code> — the form to use when Cost of goods sold (COGS) and Revenue are the values you have.</li><li><strong>Revenue</strong> = <code>Cost of goods sold (COGS) + Gross profit</code> — the form to use when Cost of goods sold (COGS) and Gross profit are the values you have.</li><li><strong>Cost of goods sold (COGS)</strong> = <code>− Gross profit + Revenue</code> — the form to use when Gross profit and Revenue are the values you have.</li><li><strong>Gross margin</strong> = <code>Gross profit ÷ Revenue</code> — the form to use when Gross profit and Revenue are the values you have.</li><li><strong>Revenue</strong> = <code>Gross profit ÷ Gross margin</code> — the form to use when Gross profit and Gross margin are the values you have.</li><li><strong>Gross profit</strong> = <code>Gross margin × Revenue</code> — the form to use when Gross margin and Revenue are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Gross profit, Revenue and Cost of goods sold (COGS) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Revenue from 10 to 20, leaving every other box alone. The panel moves from <strong>Gross profit</strong> -90 USD and <strong>Gross margin</strong> -9 perc to <strong>Gross profit</strong> -80 USD and <strong>Gross margin</strong> -4 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gross profit and Gross margin are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Revenue left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Revenue is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Cost of goods sold (COGS) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cost of goods sold (COGS) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Revenue is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Gross margin form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Revenue</strong> takes a plain number with no unit attached. The page reads it when it works out Cost of goods sold (COGS), Gross profit and Gross margin. Fill it from a measurement rather than a memory — Revenue is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost of goods sold (COGS)</strong> takes a plain number with no unit attached. The page reads it when it works out Revenue and Gross profit. Fill it from a measurement rather than a memory — Cost of goods sold (COGS) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Gross profit</strong> is a plain number and the page's own defaults put it at -90. The value follows from Cost of goods sold (COGS) and Revenue. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Gross margin</strong> is a percent figure and the page's own defaults put it at -9 perc. The value follows from Gross profit and Revenue. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Gross profit</th><th>Gross margin</th></tr></thead><tbody><tr><td><strong>Revenue</strong> +10%</td><td>+1.11%</td><td>+10.1%</td></tr><tr><td><strong>Cost of goods sold (COGS)</strong> +10%</td><td>-11.11%</td><td>-11.11%</td></tr></tbody></table><p>Ranked by leverage, Cost of goods sold (COGS) sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Revenue = 5 USD and Cost of goods sold (COGS) = 50 USD and the page reports <strong>Gross profit</strong> = -45 USD and <strong>Gross margin</strong> = -9 perc.</li><li>Feed in Revenue = 30 USD and Cost of goods sold (COGS) = 100 USD and the page reports <strong>Gross profit</strong> = -70 USD and <strong>Gross margin</strong> = -2.33 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Gross margin actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gross profit follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Revenue and Cost of goods sold (COGS) and the number you are missing is Gross profit and Gross margin.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/pag-ibig-housing-loan">Pag IBIG housing loan Calculator</a>, <a href="/finance/parking-ratio">Parking ratio Calculator</a> and <a href="/finance/partially-amortized-loan">Partially amortized loan</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gross margin calculator work out?', 'a' => 'Gross profit and Gross margin, from Cost of goods sold (COGS) and Revenue. The relationship is Gross profit = − Cost of goods sold (COGS) + Revenue.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Revenue (USD), Cost of goods sold (COGS) (USD). With revenue and cost of goods sold (COGS) in place, Gross profit can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Gross profit, Revenue, Cost of goods sold (COGS) and Gross margin can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Gross profit = -90 USD and Gross margin = -9 perc. The figures come from Revenue as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Gross profit is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Revenue blank and the page solves for it, reporting Gross profit instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Gross profit keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/pag-ibig-housing-loan', 'name' => 'Pag IBIG housing loan Calculator'],
            ['path' => '/finance/parking-ratio', 'name' => 'Parking ratio Calculator'],
            ['path' => '/finance/partially-amortized-loan', 'name' => 'Partially amortized loan'],
        ],
        'authors' => [],
    ],
];
