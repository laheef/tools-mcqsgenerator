<?php

/**
 * Cross price elasticity
 * /finance/cross-price-elasticity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cross price elasticity',
    'meta' => ['title' => 'Cross price elasticity — Free Online Calculator', 'description' => 'Cross price elasticity takes price of product A and returns elasticity. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Cross price elasticity Calculator', 'updated' => '2024-07-23'],
    'sections' => [
        [
            'title' => 'At time point 1',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'priceA1',
                            'label' => 'Price of product A',
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
                            'name' => 'quantityB1',
                            'label' => 'Demand for product B',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'At time point 2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'priceA2',
                            'label' => 'Price of product A',
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
                            'name' => 'quantityB2',
                            'label' => 'Demand for product B',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Cross price elasticity',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'elasticity',
                            'label' => 'Elasticity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'elasticity > 0', 'text' => 'The products are substitute goods.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'elasticity < 0', 'text' => 'The products are complementary goods.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'elasticity == 0', 'text' => 'The products are unrelated goods (neither complements nor substitutes).'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '0 < abs(elasticity) < 1 ', 'text' => 'Inelastic demand.'],
                                ['when' => 'abs(elasticity) > 1 ', 'text' => 'Elastic demand.'],
                                ['when' => 'abs(elasticity) = 1 ', 'text' => 'Unitary demand.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'abs(elasticity) == 1 ', 'text' => 'Unitary demand.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Cannot calculate cross price elasticity. Choose different prices or demands to try again.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'elasticity = (priceA1 + priceA2) / (quantityB1 + quantityB2) * (quantityB1 - quantityB2)/(priceA1 - priceA2) ',
            'results' => [
                'priceA2' => 'priceA1*(elasticity*quantityB1 + elasticity*quantityB2 - quantityB1 + quantityB2)/(elasticity*quantityB1 + elasticity*quantityB2 + quantityB1 - quantityB2)',
                'quantityB2' => 'quantityB1*(-elasticity*priceA1 + elasticity*priceA2 + priceA1 + priceA2)/(elasticity*priceA1 - elasticity*priceA2 + priceA1 + priceA2)',
                'quantityB1' => 'quantityB2*(elasticity*priceA1 - elasticity*priceA2 + priceA1 + priceA2)/(-elasticity*priceA1 + elasticity*priceA2 + priceA1 + priceA2)',
                'priceA1' => 'priceA2*(elasticity*quantityB1 + elasticity*quantityB2 + quantityB1 - quantityB2)/(elasticity*quantityB1 + elasticity*quantityB2 - quantityB1 + quantityB2)',
                'elasticity' => <<<'TXT'
                (priceA1*quantityB1 - priceA1*quantityB2 + priceA2*quantityB1 - priceA2*quantityB2)/(priceA1*quantityB1 + priceA1*quantityB2 - priceA2*quantityB1 - priceA2*quantityB2)
                TXT,
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Cross price elasticity turns Price of product A, Demand for product B and Price of product A into Elasticity. There is no hidden constant here: change elasticity and price of product A moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Cross price elasticity calculator works', 'html' => <<<'TXT'
            <p>Cross price elasticity answers one question from 4 numbers, and the answer is Elasticity.</p><p>What comes back is Elasticity — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Price of product A</strong> — in USD</li><li><strong>Demand for product B</strong> — a plain number, no unit</li><li><strong>Price of product A</strong> — in USD</li><li><strong>Demand for product B</strong> — a plain number, no unit</li></ul><p>The answer comes back as Elasticity. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Price of product A = 10 USD, Demand for product B = 100, Price of product A = 1000 USD and Demand for product B = 10; the answers are <strong>Elasticity</strong> = -0.8347.</p><ul><li><strong>Elasticity</strong> = -0.8347</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Elasticity</strong> = -0.8347 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Elasticity takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul></ul><p>Any one of Elasticity, Price of product A and Demand for product B can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Price of product A from 10 to 20, leaving every other box alone. The panel moves from <strong>Elasticity</strong> -0.8347 to <strong>Elasticity</strong> -0.8516.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Elasticity is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Price of product A left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price of product A is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Demand for product B left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Demand for product B is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Price of product A left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price of product A is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Price of product A is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cross price elasticity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Price of product A</strong> takes a plain number with no unit attached. Change it and Price of product A, Demand for product B and Demand for product B changes with it. Fill it from a measurement rather than a memory — Price of product A is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Demand for product B</strong> takes a plain number with no unit attached. Change it and Price of product A, Demand for product B and Price of product A changes with it. Fill it from a measurement rather than a memory — Demand for product B is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Price of product A</strong> takes a plain number with no unit attached. Change it and Demand for product B, Demand for product B and Price of product A changes with it. Fill it from a measurement rather than a memory — Price of product A is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Demand for product B</strong> takes a plain number with no unit attached. Change it and Price of product A, Demand for product B and Price of product A changes with it. Fill it from a measurement rather than a memory — Demand for product B is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Elasticity</strong> is a plain number and the page's own defaults put it at -0.8347. The value follows from Price of product A, Demand for product B, Demand for product B and Price of product A. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Elasticity</th></tr></thead><tbody><tr><td><strong>Price of product A</strong> +10%</td><td>-0.2%</td></tr><tr><td><strong>Demand for product B</strong> +10%</td><td>-1.85%</td></tr><tr><td><strong>Price of product A</strong> +10%</td><td>+0.18%</td></tr><tr><td><strong>Demand for product B</strong> +10%</td><td>+2%</td></tr></tbody></table><p>Ranked by leverage, Demand for product B sits at the top — a ten per cent error in that box shows up as roughly 2 per cent in the answer. By contrast, Price of product A and Price of product A barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Price of product A = 5 USD, Demand for product B = 50, Price of product A = 500 USD and Demand for product B = 5 and the page reports <strong>Elasticity</strong> = -0.8347.</li><li>Feed in Price of product A = 30 USD, Demand for product B = 100, Price of product A = 1000 USD and Demand for product B = 10 and the page reports <strong>Elasticity</strong> = -0.8688.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Price of product A, Demand for product B, Price of product A and Demand for product B ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Price of product A — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Elasticity against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Elasticity follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Price of product A, Demand for product B and Price of product A and the number you are missing is Elasticity.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/cpa">CPA (cost per acquisition) Calculator</a>, <a href="/finance/cpc-cpm">CPC and CPM Calculator</a> and <a href="/finance/cpi-inflation">CPI inflation</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Cross price elasticity is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Price of product A, Demand for product B, Price of product A and Demand for product B beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cross price elasticity calculator work out?', 'a' => 'Elasticity, from Price of product A, Demand for product B, Demand for product B and Price of product A.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Price of product A (USD), Demand for product B, Price of product A (USD), Demand for product B. Fill price of product A, demand for product B and price of product A and leave Elasticity empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Elasticity, Price of product A, Demand for product B and Demand for product B blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Elasticity = -0.8347. Those are the defaults written into the form — move Price of product A and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Elasticity is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Price of product A blank and the page solves for it, reporting Elasticity instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Elasticity keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/cpa', 'name' => 'CPA (cost per acquisition) Calculator'],
            ['path' => '/finance/cpc-cpm', 'name' => 'CPC and CPM Calculator'],
            ['path' => '/finance/cpi-inflation', 'name' => 'CPI inflation'],
        ],
        'authors' => [],
    ],
];
