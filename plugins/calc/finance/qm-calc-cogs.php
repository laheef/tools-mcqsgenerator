<?php

/**
 * Cost of goods sold
 * /finance/cogs
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cost of goods sold',
    'meta' => ['title' => 'Cost of goods sold Calculator: Free, With Steps', 'description' => 'Enter beginning inventory and purchases and get Cost of goods sold (COGS) back. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Cost of goods sold Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beginning_inventory',
                            'label' => 'Beginning inventory',
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
                            'name' => 'purchases',
                            'label' => 'Purchases',
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
                            'name' => 'ending_inventory',
                            'label' => 'Ending inventory',
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
                            'label' => 'Cost of goods sold (COGS)',
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
            'title' => 'cost_of_goods_sold = beginning_inventory + purchases - ending_inventory',
            'results' => ['beginning_inventory' => 'cost_of_goods_sold + ending_inventory - purchases', 'ending_inventory' => 'beginning_inventory - cost_of_goods_sold + purchases', 'purchases' => '-beginning_inventory + cost_of_goods_sold + ending_inventory', 'cost_of_goods_sold' => 'beginning_inventory - ending_inventory + purchases'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cost of goods sold turns Beginning inventory, Purchases and Ending inventory into Cost of goods sold (COGS). Nothing is looked up on this page: cost of goods sold (COGS) is computed from beginning inventory and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Cost of goods sold (COGS) is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Cost of goods sold calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cost of goods sold: it takes 3 numbers and reports Cost of goods sold (COGS).</p><p>The relationship it solves reads Cost of goods sold (COGS) = Beginning inventory − Ending inventory + Purchases.</p><p>What comes back is Cost of goods sold (COGS) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Beginning inventory</strong> — in USD</li><li><strong>Purchases</strong> — in USD</li><li><strong>Ending inventory</strong> — in USD</li></ul><p>What you get back is Cost of goods sold (COGS) in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Beginning inventory = 10 USD, Purchases = 100 USD and Ending inventory = 1000 USD — through the same formula and the panel reports <strong>Cost of goods sold (COGS)</strong> = -890 USD.</p><ul><li><strong>Cost of goods sold (COGS)</strong> = -890 USD</li></ul><p>That is <strong>Cost of goods sold (COGS)</strong> = <code>Beginning inventory − Ending inventory + Purchases</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Cost of goods sold (COGS)</strong> = -890 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Cost of goods sold (COGS) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cost of goods sold (COGS)</strong> = <code>Beginning inventory − Ending inventory + Purchases</code></li><li><strong>Beginning inventory</strong> = <code>Cost of goods sold (COGS) + Ending inventory − Purchases</code></li><li><strong>Ending inventory</strong> = <code>Beginning inventory − Cost of goods sold (COGS) + Purchases</code></li><li><strong>Purchases</strong> = <code>− Beginning inventory + Cost of goods sold (COGS) + Ending inventory</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cost of goods sold (COGS)</strong> = <code>Beginning inventory − Ending inventory + Purchases</code> — the form to use when Beginning inventory, Ending inventory and Purchases are the values you have.</li><li><strong>Beginning inventory</strong> = <code>Cost of goods sold (COGS) + Ending inventory − Purchases</code> — the form to use when Cost of goods sold (COGS), Ending inventory and Purchases are the values you have.</li><li><strong>Ending inventory</strong> = <code>Beginning inventory − Cost of goods sold (COGS) + Purchases</code> — the form to use when Beginning inventory, Cost of goods sold (COGS) and Purchases are the values you have.</li><li><strong>Purchases</strong> = <code>− Beginning inventory + Cost of goods sold (COGS) + Ending inventory</code> — the form to use when Beginning inventory, Cost of goods sold (COGS) and Ending inventory are the values you have.</li></ul><p>Any one of Cost of goods sold (COGS), Beginning inventory and Ending inventory can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Beginning inventory, from 10 to 20 — and the answers go from <strong>Cost of goods sold (COGS)</strong> -890 USD to <strong>Cost of goods sold (COGS)</strong> -880 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cost of goods sold (COGS) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Beginning inventory left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Beginning inventory is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Purchases left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Purchases is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Ending inventory left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Ending inventory is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Beginning inventory to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cost of goods sold form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Beginning inventory</strong> takes a plain number with no unit attached. The page reads it when it works out Ending inventory, Purchases and Cost of goods sold (COGS). Fill it from a measurement rather than a memory — Beginning inventory is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Purchases</strong> takes a plain number with no unit attached. The page reads it when it works out Beginning inventory, Ending inventory and Cost of goods sold (COGS). Fill it from a measurement rather than a memory — Purchases is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ending inventory</strong> takes a plain number with no unit attached. The page reads it when it works out Beginning inventory, Purchases and Cost of goods sold (COGS). Fill it from a measurement rather than a memory — Ending inventory is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cost of goods sold (COGS)</strong> is a plain number and the page's own defaults put it at -890. It is worked out from Beginning inventory, Ending inventory and Purchases. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cost of goods sold (COGS)</th></tr></thead><tbody><tr><td><strong>Beginning inventory</strong> +10%</td><td>+0.11%</td></tr><tr><td><strong>Purchases</strong> +10%</td><td>+1.12%</td></tr><tr><td><strong>Ending inventory</strong> +10%</td><td>-11.24%</td></tr></tbody></table><p>Ranked by leverage, Ending inventory sits at the top — a ten per cent error in that box shows up as roughly 11.2 per cent in the answer. By contrast, Beginning inventory barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Beginning inventory = 5 USD, Purchases = 50 USD and Ending inventory = 500 USD and the page reports <strong>Cost of goods sold (COGS)</strong> = -445 USD.</li><li>Feed in Beginning inventory = 30 USD, Purchases = 100 USD and Ending inventory = 1000 USD and the page reports <strong>Cost of goods sold (COGS)</strong> = -870 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Beginning inventory, Purchases and Ending inventory ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Beginning inventory — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Cost of goods sold (COGS) in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cost of goods sold (COGS) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Beginning inventory, Purchases and Ending inventory and the number you are missing is Cost of goods sold (COGS).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/gdp-gap">GDP gap</a>, <a href="/finance/gdp-growth">GDP growth rate Calculator</a> and <a href="/finance/gdp-per-capita">GDP per capita Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cost of goods sold calculator work out?', 'a' => <<<'TXT'
            Cost of goods sold (COGS), from Beginning inventory, Ending inventory and Purchases. The relationship is Cost of goods sold (COGS) = Beginning inventory − Ending inventory + Purchases.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Beginning inventory (USD), Purchases (USD), Ending inventory (USD). Fill beginning inventory, purchases and ending inventory and leave Cost of goods sold (COGS) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Cost of goods sold (COGS), Beginning inventory, Ending inventory and Purchases blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Cost of goods sold (COGS) = -890 USD. Those are the defaults written into the form — move Beginning inventory and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Cost of goods sold (COGS) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Beginning inventory blank and the page solves for it, reporting Cost of goods sold (COGS) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cost of goods sold (COGS) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/gdp-gap', 'name' => 'GDP gap'],
            ['path' => '/finance/gdp-growth', 'name' => 'GDP growth rate Calculator'],
            ['path' => '/finance/gdp-per-capita', 'name' => 'GDP per capita Calculator'],
        ],
        'authors' => [],
    ],
];
