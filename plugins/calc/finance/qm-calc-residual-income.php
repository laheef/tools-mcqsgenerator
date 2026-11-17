<?php

/**
 * Residual income
 * /finance/residual-income
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Residual income',
    'meta' => ['title' => 'Residual income — Formula, Steps & Examples', 'description' => 'Residual income works out equity charge from equity capital, cost of equity and net income. Every box can be solved for, not only the one in the title.', 'h1' => 'Residual income Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Equity Charge',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'equity_capital',
                            'label' => 'Equity capital',
                            'type' => 'number',
                            'help' => 'The amount of equity being injected into the company by its shareholders.',
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
                            'name' => 'equity_cost',
                            'label' => 'Cost of equity',
                            'type' => 'number',
                            'help' => 'The return shareholders request for investing in a given company.',
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
                            'name' => 'equity_charge',
                            'label' => 'Equity charge',
                            'type' => 'number',
                            'help' => 'The equity charge reflects the cost of opportunity for all the equity holders.',
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
            'title' => 'Residual income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_income',
                            'label' => 'Net income',
                            'type' => 'number',
                            'help' => 'The company\'s net income can be found on the last line of the income statement of most companies.',
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
                            'name' => 'residual_income',
                            'label' => 'Residual income',
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
            'title' => 'residual_income = net_income - equity_charge',
            'results' => ['residual_income' => '-equity_charge + net_income', 'equity_charge' => 'net_income - residual_income', 'net_income' => 'equity_charge + residual_income'],
        ],
        [
            'title' => 'equity_charge = equity_capital * equity_cost',
            'results' => ['equity_capital' => 'equity_charge/equity_cost', 'equity_charge' => 'equity_capital*equity_cost', 'equity_cost' => 'equity_charge/equity_capital'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Residual income turns Equity charge and Net income into Equity capital and Cost of equity. There is no hidden constant here: change equity capital and equity charge moves with it. The main result, Equity capital, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Residual income calculator works', 'html' => <<<'TXT'
            <p>The Residual income calculator applies one relationship to 2 numbers and reports Equity capital, Cost of equity and Residual income.</p><p>The relationship it solves reads Residual income = − Equity charge + Net income.</p><p>The result panel carries Equity capital, Cost of equity and Residual income, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Equity charge</strong> — in USD. The equity charge reflects the cost of opportunity for all the equity holders.</li><li><strong>Net income</strong> — in USD. The company&#039;s net income can be found on the last line of the income statement of most companies.</li></ul><p>The result boxes are Equity capital in USD, Cost of equity in percent, Residual income in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Equity capital = 10 USD, Cost of equity = 100 perc, Equity charge = 1000 USD and Net income = 10 USD gives <strong>Residual income</strong> = -990 USD.</p><ul><li><strong>Residual income</strong> = -990 USD</li></ul><p>That is <strong>Residual income</strong> = <code>− Equity charge + Net income</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Residual income</strong> = -990 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Cost of equity offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Residual income</strong> = <code>− Equity charge + Net income</code></li><li><strong>Equity charge</strong> = <code>Net income − Residual income</code></li><li><strong>Net income</strong> = <code>Equity charge + Residual income</code></li><li><strong>Equity capital</strong> = <code>Equity charge ÷ Cost of equity</code></li><li><strong>Cost of equity</strong> = <code>Equity charge ÷ Equity capital</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Residual income</strong> = <code>− Equity charge + Net income</code> — the form to use when Equity charge and Net income are the values you have.</li><li><strong>Equity charge</strong> = <code>Net income − Residual income</code> — the form to use when Net income and Residual income are the values you have.</li><li><strong>Net income</strong> = <code>Equity charge + Residual income</code> — the form to use when Equity charge and Residual income are the values you have.</li><li><strong>Equity charge</strong> = <code>Equity capital × Cost of equity</code> — the form to use when Equity capital and Cost of equity are the values you have.</li><li><strong>Equity capital</strong> = <code>Equity charge ÷ Cost of equity</code> — the form to use when Equity charge and Cost of equity are the values you have.</li><li><strong>Cost of equity</strong> = <code>Equity charge ÷ Equity capital</code> — the form to use when Equity charge and Equity capital are the values you have.</li></ul><p>Any one of Residual income, Equity charge and Net income can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Equity capital from 10 to 20, leaving every other box alone. The panel moves from <strong>Residual income</strong> -990 USD to <strong>Residual income</strong> -990 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Equity capital, Cost of equity and Residual income are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Equity charge left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Equity charge is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Net income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Equity charge is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Residual income form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Equity charge</strong> takes a plain number with no unit attached. The equity charge reflects the cost of opportunity for all the equity holders. It feeds Residual income, Net income and Equity capital. Fill it from a measurement rather than a memory — Equity charge is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Net income</strong> takes a plain number with no unit attached. The company&#039;s net income can be found on the last line of the income statement of most companies. It feeds Residual income and Equity charge. Fill it from a measurement rather than a memory — Net income is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Equity capital</strong> is a plain number. The value follows from Equity charge and Cost of equity. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cost of equity</strong> is a percent figure. The value follows from Equity charge and Equity capital. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Residual income</strong> is a plain number and the page's own defaults put it at -990. The value follows from Equity charge and Net income. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Residual income</th></tr></thead><tbody><tr><td><strong>Equity capital</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Cost of equity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Equity charge</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Net income</strong> +10%</td><td>+0.1%</td></tr></tbody></table><p>Ranked by leverage, Equity charge sits at the top — a ten per cent error in that box shows up as roughly 10.1 per cent in the answer. By contrast, Net income, Equity capital and Cost of equity barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Equity capital = 5 USD, Cost of equity = 50 perc, Equity charge = 500 USD and Net income = 5 USD and the page reports <strong>Residual income</strong> = -495 USD.</li><li>Feed in Equity capital = 30 USD, Cost of equity = 100 perc, Equity charge = 1000 USD and Net income = 10 USD and the page reports <strong>Residual income</strong> = -990 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Residual income actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Equity capital follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Equity charge and Net income are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Equity charge and Net income is what you already know and Equity capital and Cost of equity is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/money-factor">Money factor</a>, <a href="/finance/money-market-account">Money market account Calculator</a> and <a href="/finance/money-multiplier">Money multiplier Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Residual income calculator work out?', 'a' => 'Equity capital, Cost of equity and Residual income, from Equity charge and Net income. The relationship is Residual income = − Equity charge + Net income.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Equity charge (USD), Net income (USD). Enter equity charge and net income; Equity capital is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Residual income, Equity charge, Net income and Equity capital blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Residual income = -990 USD. Those are the defaults written into the form — move Equity charge and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Equity capital is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Equity charge blank and the page solves for it, reporting Equity capital instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Equity capital at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/money-factor', 'name' => 'Money factor'],
            ['path' => '/finance/money-market-account', 'name' => 'Money market account Calculator'],
            ['path' => '/finance/money-multiplier', 'name' => 'Money multiplier Calculator'],
        ],
        'authors' => [],
    ],
];
