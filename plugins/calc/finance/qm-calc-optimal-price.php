<?php

/**
 * Optimal price
 * /finance/optimal-price
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Optimal price',
    'meta' => ['title' => 'Optimal price Calculator — Formula & Results', 'description' => 'Optimal price works out marginal costs and marginal revenue and reports both. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Optimal price Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'marginalCosts',
                            'label' => 'Marginal costs',
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
                            'name' => 'marginalRevenue',
                            'label' => 'Marginal revenue',
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
            'title' => 'Price elasticity of demand',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initialPrice',
                            'label' => 'Initial price',
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
                            'name' => 'initialQuantity',
                            'label' => 'Initial quantity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalPrice',
                            'label' => 'Final price',
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
                            'name' => 'finalQuantity',
                            'label' => 'Final quantity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'priceElasticityOfDemand',
                            'label' => 'Price elasticity of demand',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Optimum',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'optimalPrice',
                            'label' => 'Optimal price',
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
                            'name' => 'optimalQuantity',
                            'label' => 'Optimal quantity',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Total profit figures',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'profitAtInitialPrice',
                            'label' => 'Profit at initial price',
                            'type' => 'number',
                            'help' => '...and initial quantity.',
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
                            'name' => 'profitAtFinalPrice',
                            'label' => 'Profit at final price',
                            'type' => 'number',
                            'help' => '...and final quantity.',
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
                            'name' => 'profitAtOptimalPrice',
                            'label' => 'Profit at optimal price',
                            'type' => 'number',
                            'help' => '...and optimum quantity.',
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
            'title' => 'marginalRevenue = optimalPrice*(1+1/priceElasticityOfDemand)',
            'results' => ['priceElasticityOfDemand' => 'optimalPrice/(marginalRevenue - optimalPrice)', 'marginalRevenue' => 'optimalPrice + optimalPrice/priceElasticityOfDemand', 'optimalPrice' => 'marginalRevenue*priceElasticityOfDemand/(priceElasticityOfDemand + 1)'],
        ],
        [
            'title' => 'marginalCosts = marginalRevenue',
            'results' => ['marginalCosts' => 'marginalRevenue', 'marginalRevenue' => 'marginalCosts'],
        ],
        [
            'title' => 'optimalPrice = marginalCosts*(priceElasticityOfDemand/(priceElasticityOfDemand+1))',
            'results' => ['priceElasticityOfDemand' => 'optimalPrice/(marginalCosts - optimalPrice)', 'marginalCosts' => 'optimalPrice + optimalPrice/priceElasticityOfDemand', 'optimalPrice' => 'marginalCosts*priceElasticityOfDemand/(priceElasticityOfDemand + 1)'],
        ],
        [
            'title' => 'priceElasticityOfDemand = ((finalQuantity - initialQuantity)/(finalQuantity + initialQuantity))/((finalPrice - initialPrice)/(finalPrice + initialPrice))',
            'results' => [
                'finalQuantity' => <<<'TXT'
                initialQuantity*(finalPrice*priceElasticityOfDemand + finalPrice - initialPrice*priceElasticityOfDemand + initialPrice)/(-finalPrice*priceElasticityOfDemand + finalPrice + initialPrice*priceElasticityOfDemand + initialPrice)
                TXT,
                'finalPrice' => <<<'TXT'
                initialPrice*(finalQuantity*priceElasticityOfDemand + finalQuantity + initialQuantity*priceElasticityOfDemand - initialQuantity)/(finalQuantity*priceElasticityOfDemand - finalQuantity + initialQuantity*priceElasticityOfDemand + initialQuantity)
                TXT,
                'initialPrice' => <<<'TXT'
                finalPrice*(finalQuantity*priceElasticityOfDemand - finalQuantity + initialQuantity*priceElasticityOfDemand + initialQuantity)/(finalQuantity*priceElasticityOfDemand + finalQuantity + initialQuantity*priceElasticityOfDemand - initialQuantity)
                TXT,
                'priceElasticityOfDemand' => <<<'TXT'
                (finalPrice*finalQuantity - finalPrice*initialQuantity + finalQuantity*initialPrice - initialPrice*initialQuantity)/(finalPrice*finalQuantity + finalPrice*initialQuantity - finalQuantity*initialPrice - initialPrice*initialQuantity)
                TXT,
                'initialQuantity' => <<<'TXT'
                finalQuantity*(-finalPrice*priceElasticityOfDemand + finalPrice + initialPrice*priceElasticityOfDemand + initialPrice)/(finalPrice*priceElasticityOfDemand + finalPrice - initialPrice*priceElasticityOfDemand + initialPrice)
                TXT,
            ],
        ],
        [
            'title' => 'profitAtFinalPrice = finalPrice * finalQuantity - marginalCosts * finalQuantity',
            'results' => ['finalQuantity' => 'profitAtFinalPrice/(finalPrice - marginalCosts)', 'marginalCosts' => 'finalPrice - profitAtFinalPrice/finalQuantity', 'profitAtFinalPrice' => 'finalQuantity*(finalPrice - marginalCosts)', 'finalPrice' => 'marginalCosts + profitAtFinalPrice/finalQuantity'],
        ],
        [
            'title' => 'profitAtInitialPrice = initialPrice * initialQuantity - marginalCosts * initialQuantity',
            'results' => ['profitAtInitialPrice' => 'initialQuantity*(initialPrice - marginalCosts)', 'marginalCosts' => 'initialPrice - profitAtInitialPrice/initialQuantity', 'initialPrice' => 'marginalCosts + profitAtInitialPrice/initialQuantity', 'initialQuantity' => 'profitAtInitialPrice/(initialPrice - marginalCosts)'],
        ],
        [
            'title' => 'priceElasticityOfDemand = ((finalQuantity - optimalQuantity)/(finalQuantity + optimalQuantity))/((finalPrice - optimalPrice)/(finalPrice + optimalPrice))',
            'results' => [
                'optimalQuantity' => <<<'TXT'
                finalQuantity*(-finalPrice*priceElasticityOfDemand + finalPrice + optimalPrice*priceElasticityOfDemand + optimalPrice)/(finalPrice*priceElasticityOfDemand + finalPrice - optimalPrice*priceElasticityOfDemand + optimalPrice)
                TXT,
                'finalQuantity' => <<<'TXT'
                optimalQuantity*(finalPrice*priceElasticityOfDemand + finalPrice - optimalPrice*priceElasticityOfDemand + optimalPrice)/(-finalPrice*priceElasticityOfDemand + finalPrice + optimalPrice*priceElasticityOfDemand + optimalPrice)
                TXT,
                'optimalPrice' => <<<'TXT'
                finalPrice*(finalQuantity*priceElasticityOfDemand - finalQuantity + optimalQuantity*priceElasticityOfDemand + optimalQuantity)/(finalQuantity*priceElasticityOfDemand + finalQuantity + optimalQuantity*priceElasticityOfDemand - optimalQuantity)
                TXT,
                'finalPrice' => <<<'TXT'
                optimalPrice*(finalQuantity*priceElasticityOfDemand + finalQuantity + optimalQuantity*priceElasticityOfDemand - optimalQuantity)/(finalQuantity*priceElasticityOfDemand - finalQuantity + optimalQuantity*priceElasticityOfDemand + optimalQuantity)
                TXT,
                'priceElasticityOfDemand' => <<<'TXT'
                (finalPrice*finalQuantity - finalPrice*optimalQuantity + finalQuantity*optimalPrice - optimalPrice*optimalQuantity)/(finalPrice*finalQuantity + finalPrice*optimalQuantity - finalQuantity*optimalPrice - optimalPrice*optimalQuantity)
                TXT,
            ],
        ],
        [
            'title' => 'profitAtOptimalPrice = optimalPrice * optimalQuantity - marginalCosts * optimalQuantity',
            'results' => ['optimalPrice' => 'marginalCosts + profitAtOptimalPrice/optimalQuantity', 'profitAtOptimalPrice' => 'optimalQuantity*(-marginalCosts + optimalPrice)', 'marginalCosts' => 'optimalPrice - profitAtOptimalPrice/optimalQuantity', 'optimalQuantity' => '-profitAtOptimalPrice/(marginalCosts - optimalPrice)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Optimal price turns Price elasticity of demand and Optimal price into Marginal costs and Marginal revenue. Nothing is looked up on this page: marginal costs is computed from price elasticity of demand and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Marginal costs is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Optimal price calculator works', 'html' => <<<'TXT'
            <p>The Optimal price calculator applies one relationship to 2 numbers and reports Marginal costs, Marginal revenue and Initial price.</p><p>In the form&#039;s own words, Marginal revenue = Optimal price + Optimal price ÷ Price elasticity of demand.</p><p>What comes back is Marginal costs, Marginal revenue, Initial price and Initial quantity — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Price elasticity of demand</strong> — a plain number, no unit</li><li><strong>Optimal price</strong> — in USD</li></ul><p>The result boxes are Marginal costs in USD, Marginal revenue in USD, Initial price in USD, Initial quantity, Final price in USD, Final quantity, Optimal quantity, Profit at initial price in USD, Profit at final price in USD, Profit at optimal price in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Marginal costs = 10 USD, Marginal revenue = 100 USD, Initial price = 1000 USD, Initial quantity = 10, Final price = 100 USD, Final quantity = 1000, Optimal price = 10 USD, Optimal quantity = 100, Profit at initial price = 1000 USD, Profit at final price = 10 USD and Profit at optimal price = 100 USD; the answers are <strong>Price elasticity of demand</strong> = 0.1111.</p><ul><li><strong>Price elasticity of demand</strong> = 0.1111</li></ul><p>The line behind those figures is <strong>Marginal revenue</strong> = <code>Optimal price + Optimal price ÷ Price elasticity of demand</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Price elasticity of demand</strong> = 0.1111 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Marginal costs takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Marginal revenue</strong> = <code>Optimal price + Optimal price ÷ Price elasticity of demand</code></li><li><strong>Price elasticity of demand</strong> = <code>Optimal price ÷ (Marginal revenue − Optimal price)</code></li><li><strong>Optimal price</strong> = <code>Marginal revenue × Price elasticity of demand ÷ (Price elasticity of demand + 1)</code></li><li><strong>Marginal costs</strong> = <code>Marginal revenue</code></li><li><strong>Profit at final price</strong> = <code>Final quantity × (Final price − Marginal costs)</code></li><li><strong>Final quantity</strong> = <code>Profit at final price ÷ (Final price − Marginal costs)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Marginal revenue</strong> = <code>Optimal price + Optimal price ÷ Price elasticity of demand</code> — the form to use when Optimal price and Price elasticity of demand are the values you have.</li><li><strong>Price elasticity of demand</strong> = <code>Optimal price ÷ (Marginal revenue − Optimal price)</code> — the form to use when Optimal price and Marginal revenue are the values you have.</li><li><strong>Optimal price</strong> = <code>Marginal revenue × Price elasticity of demand ÷ (Price elasticity of demand + 1)</code> — the form to use when Marginal revenue and Price elasticity of demand are the values you have.</li><li><strong>Marginal costs</strong> = <code>Marginal revenue</code> — the form to use when Marginal revenue are the values you have.</li><li><strong>Marginal revenue</strong> = <code>Marginal costs</code> — the form to use when Marginal costs are the values you have.</li><li><strong>Optimal price</strong> = <code>Marginal costs × Price elasticity of demand ÷ (Price elasticity of demand + 1)</code> — the form to use when Marginal costs and Price elasticity of demand are the values you have.</li><li><strong>Price elasticity of demand</strong> = <code>Optimal price ÷ (Marginal costs − Optimal price)</code> — the form to use when Optimal price and Marginal costs are the values you have.</li><li><strong>Marginal costs</strong> = <code>Optimal price + Optimal price ÷ Price elasticity of demand</code> — the form to use when Optimal price and Price elasticity of demand are the values you have.</li></ul><p>Any one of Marginal revenue, Price elasticity of demand and Optimal price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Marginal costs, from 10 to 20 — and the answers go from <strong>Price elasticity of demand</strong> 0.1111 to <strong>Price elasticity of demand</strong> 0.1111.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Marginal costs, Marginal revenue and Initial price are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Price elasticity of demand left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price elasticity of demand is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Optimal price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Optimal price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Price elasticity of demand is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Optimal price form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Price elasticity of demand</strong> takes a plain number with no unit attached. It feeds Marginal revenue, Optimal price and Marginal costs. Fill it from a measurement rather than a memory — Price elasticity of demand is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Optimal price</strong> takes a plain number with no unit attached. It feeds Price elasticity of demand, Marginal revenue and Marginal costs. Fill it from a measurement rather than a memory — Optimal price is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 10 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Marginal costs</strong> is a plain number. The value follows from Marginal revenue. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Marginal revenue</strong> is a plain number. The value follows from Optimal price and Price elasticity of demand. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Initial price</strong> is a plain number. The value follows from Final price, Final quantity, Price elasticity of demand and Initial quantity. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Initial quantity</strong> is a plain number. The value follows from Final quantity, Final price, Price elasticity of demand and Initial price. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Final price</strong> is a plain number. The value follows from Initial price, Final quantity, Price elasticity of demand and Initial quantity. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Final quantity</strong> is a plain number. The value follows from Initial quantity, Final price, Price elasticity of demand and Initial price. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Optimal quantity</strong> is a plain number. The value follows from Final quantity, Final price, Price elasticity of demand and Optimal price. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Profit at initial price</strong> is a plain number. The value follows from Initial quantity, Initial price and Marginal costs. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Profit at final price</strong> is a plain number. The value follows from Final quantity, Final price and Marginal costs. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Profit at optimal price</strong> is a plain number. The value follows from Optimal quantity, Marginal costs and Optimal price. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Price elasticity of demand</th></tr></thead><tbody><tr><td><strong>Marginal costs</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Marginal revenue</strong> +10%</td><td>-10%</td></tr><tr><td><strong>Initial price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Initial quantity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Final price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Final quantity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Optimal price</strong> +10%</td><td>+11.24%</td></tr><tr><td><strong>Optimal quantity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Profit at initial price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Profit at final price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Profit at optimal price</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Optimal price sits at the top — a ten per cent error in that box shows up as roughly 11.2 per cent in the answer. By contrast, Marginal costs, Initial price and Initial quantity barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Marginal costs follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Price elasticity of demand and Optimal price and the number you are missing is Marginal costs and Marginal revenue.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/ctr">CTR Calculator</a>, <a href="/finance/currency-converter">Currency converter Calculator</a> and <a href="/finance/currency-forward">Currency forward Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Optimal price calculator work out?', 'a' => <<<'TXT'
            Marginal costs, Marginal revenue, Initial price and Initial quantity, from Optimal price and Price elasticity of demand. The relationship is Marginal revenue = Optimal price + Optimal price ÷ Price elasticity of demand.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Price elasticity of demand, Optimal price (USD). Fill price elasticity of demand and optimal price and leave Marginal costs empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Marginal revenue, Price elasticity of demand, Optimal price and Marginal costs blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Price elasticity of demand = 0.1111. Those are the defaults written into the form — move Price elasticity of demand and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Marginal costs is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Price elasticity of demand blank and the page solves for it, reporting Marginal costs instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Marginal costs keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/ctr', 'name' => 'CTR Calculator'],
            ['path' => '/finance/currency-converter', 'name' => 'Currency converter Calculator'],
            ['path' => '/finance/currency-forward', 'name' => 'Currency forward Calculator'],
        ],
        'authors' => [],
    ],
];
