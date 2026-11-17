<?php

/**
 * Consumer surplus
 * /finance/consumer-surplus
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Consumer surplus',
    'meta' => ['title' => 'Consumer surplus — Formula, Steps & Examples', 'description' => 'Consumer surplus takes actual price, willing price and equilibrium price and returns extended consumer surplus. The formula is printed in the form\'s own words.', 'h1' => 'Consumer surplus Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ActPrice',
                            'label' => 'Actual price',
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
                            'name' => 'MaxPrice',
                            'label' => 'Willing price',
                            'type' => 'number',
                            'help' => 'The price the buyer is willing to pay.',
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
                            'name' => 'ConSur',
                            'label' => 'Consumer surplus',
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
            'title' => 'Related Information',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'equilibriumPrice',
                            'label' => 'Equilibrium price',
                            'type' => 'number',
                            'help' => 'The price where the supply and demand are equal.',
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
                            'name' => 'equilibriumQuantity',
                            'label' => 'Equilibrium quantity',
                            'type' => 'number',
                            'help' => 'The quantity where the supply and demand are equal.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ExtConSur',
                            'label' => 'Extended consumer surplus',
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
            'title' => 'ConSur = MaxPrice - ActPrice',
            'results' => ['MaxPrice' => 'ActPrice + ConSur', 'ActPrice' => '-ConSur + MaxPrice', 'ConSur' => '-ActPrice + MaxPrice'],
        ],
        [
            'title' => 'ExtConSur = 0.5 * equilibriumQuantity * (MaxPrice - equilibriumPrice)',
            'results' => ['equilibriumPrice' => '-2*ExtConSur/equilibriumQuantity + MaxPrice', 'MaxPrice' => '2*ExtConSur/equilibriumQuantity + equilibriumPrice', 'ExtConSur' => '(1/2)*equilibriumQuantity*(MaxPrice - equilibriumPrice)', 'equilibriumQuantity' => '2*ExtConSur/(MaxPrice - equilibriumPrice)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Consumer surplus turns Actual price and Willing price into Consumer surplus and Equilibrium price. There is no hidden constant here: change consumer surplus and actual price moves with it. The main result, Consumer surplus, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Consumer surplus calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Consumer surplus: it takes 2 numbers and reports Consumer surplus, Equilibrium price and Equilibrium quantity.</p><p>In the form&#039;s own words, Consumer surplus = − Actual price + Willing price.</p><p>What comes back is Consumer surplus, Equilibrium price, Equilibrium quantity and Extended consumer surplus — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Actual price</strong> — in USD</li><li><strong>Willing price</strong> — in USD. The price the buyer is willing to pay.</li></ul><p>The answers come back as Consumer surplus in USD, Equilibrium price in USD, Equilibrium quantity, Extended consumer surplus in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Actual price = 10 USD, Willing price = 100 USD, Equilibrium price = 1000 USD, Equilibrium quantity = 10 and Extended consumer surplus = 100 USD gives <strong>Consumer surplus</strong> = 90 USD.</p><ul><li><strong>Consumer surplus</strong> = 90 USD</li></ul><p>That is <strong>Consumer surplus</strong> = <code>− Actual price + Willing price</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Consumer surplus</strong> = 90 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Consumer surplus takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Consumer surplus</strong> = <code>− Actual price + Willing price</code></li><li><strong>Willing price</strong> = <code>Actual price + Consumer surplus</code></li><li><strong>Actual price</strong> = <code>− Consumer surplus + Willing price</code></li><li><strong>Extended consumer surplus</strong> = <code>(1 ÷ 2) × Equilibrium quantity × (Willing price − Equilibrium price)</code></li><li><strong>Equilibrium price</strong> = <code>− 2 × Extended consumer surplus ÷ Equilibrium quantity + Willing price</code></li><li><strong>Equilibrium quantity</strong> = <code>2 × Extended consumer surplus ÷ (Willing price − Equilibrium price)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Consumer surplus</strong> = <code>− Actual price + Willing price</code> — the form to use when Actual price and Willing price are the values you have.</li><li><strong>Willing price</strong> = <code>Actual price + Consumer surplus</code> — the form to use when Actual price and Consumer surplus are the values you have.</li><li><strong>Actual price</strong> = <code>− Consumer surplus + Willing price</code> — the form to use when Consumer surplus and Willing price are the values you have.</li><li><strong>Extended consumer surplus</strong> = <code>(1 ÷ 2) × Equilibrium quantity × (Willing price − Equilibrium price)</code> — the form to use when Equilibrium quantity, Willing price and Equilibrium price are the values you have.</li><li><strong>Equilibrium price</strong> = <code>− 2 × Extended consumer surplus ÷ Equilibrium quantity + Willing price</code> — the form to use when Extended consumer surplus, Equilibrium quantity and Willing price are the values you have.</li><li><strong>Willing price</strong> = <code>2 × Extended consumer surplus ÷ Equilibrium quantity + Equilibrium price</code> — the form to use when Extended consumer surplus, Equilibrium quantity and Equilibrium price are the values you have.</li><li><strong>Equilibrium quantity</strong> = <code>2 × Extended consumer surplus ÷ (Willing price − Equilibrium price)</code> — the form to use when Extended consumer surplus, Willing price and Equilibrium price are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Consumer surplus, Willing price and Actual price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Actual price from 10 to 20, leaving every other box alone. The panel moves from <strong>Consumer surplus</strong> 90 USD to <strong>Consumer surplus</strong> 80 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Consumer surplus, Equilibrium price and Equilibrium quantity are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Actual price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Actual price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Willing price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Willing price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Actual price is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Consumer surplus form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Actual price</strong> takes a plain number with no unit attached. The page reads it when it works out Willing price and Consumer surplus. Fill it from a measurement rather than a memory — Actual price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Willing price</strong> takes a plain number with no unit attached. The price the buyer is willing to pay. The page reads it when it works out Actual price, Consumer surplus and Equilibrium price. Fill it from a measurement rather than a memory — Willing price is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Consumer surplus</strong> is a plain number and the page's own defaults put it at 90. It is worked out from Actual price and Willing price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Equilibrium price</strong> is a plain number. It is worked out from Extended consumer surplus, Equilibrium quantity and Willing price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Equilibrium quantity</strong> is a plain number. It is worked out from Extended consumer surplus, Willing price and Equilibrium price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Extended consumer surplus</strong> is a plain number. It is worked out from Equilibrium quantity, Willing price and Equilibrium price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Consumer surplus</th></tr></thead><tbody><tr><td><strong>Actual price</strong> +10%</td><td>-1.11%</td></tr><tr><td><strong>Willing price</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Equilibrium price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Equilibrium quantity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Extended consumer surplus</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Willing price sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. By contrast, Equilibrium price, Equilibrium quantity and Extended consumer surplus barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Actual price = 5 USD, Willing price = 50 USD, Equilibrium price = 500 USD, Equilibrium quantity = 5 and Extended consumer surplus = 50 USD and the page reports <strong>Consumer surplus</strong> = 45 USD.</li><li>Feed in Actual price = 30 USD, Willing price = 100 USD, Equilibrium price = 1000 USD, Equilibrium quantity = 10 and Extended consumer surplus = 100 USD and the page reports <strong>Consumer surplus</strong> = 70 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Consumer surplus follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Actual price and Willing price are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Actual price and Willing price and the number you are missing is Consumer surplus and Equilibrium price.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/time-and-a-half">Time and a half Calculator</a>, <a href="/finance/time-value-of-money">Time value of money</a> and <a href="/finance/times-interest-earned-ratio">Times interest earned ratio</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Consumer surplus calculator work out?', 'a' => <<<'TXT'
            Consumer surplus, Equilibrium price, Equilibrium quantity and Extended consumer surplus, from Actual price and Willing price. The relationship is Consumer surplus = − Actual price + Willing price.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Actual price (USD), Willing price (USD). With actual price and willing price in place, Consumer surplus can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Consumer surplus, Willing price, Actual price and Extended consumer surplus can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Consumer surplus = 90 USD. The figures come from Actual price as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Consumer surplus is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Actual price blank and the page solves for it, reporting Consumer surplus instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Consumer surplus at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/time-and-a-half', 'name' => 'Time and a half Calculator'],
            ['path' => '/finance/time-value-of-money', 'name' => 'Time value of money'],
            ['path' => '/finance/times-interest-earned-ratio', 'name' => 'Times interest earned ratio'],
        ],
        'authors' => [],
    ],
];
