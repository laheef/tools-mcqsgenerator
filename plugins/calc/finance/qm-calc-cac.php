<?php

/**
 * Customer acquisition cost (CAC)
 * /finance/cac
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Customer acquisition cost (CAC)',
    'meta' => ['title' => 'Customer acquisition cost (CAC) — Formula & Results', 'description' => 'Customer acquisition cost (CAC) turns cost of marketing and cost of sales into customer acquisition cost (CAC). The formula is printed in the form\'s own words.', 'h1' => 'Customer acquisition cost (CAC) Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_of_marketing',
                            'label' => 'Cost of marketing',
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
                            'name' => 'cost_of_sales',
                            'label' => 'Cost of sales',
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
                            'name' => 'number_of_new_customers',
                            'label' => 'Number of new customers',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'customer_acquisition_cost',
                            'label' => 'Customer acquisition cost (CAC)',
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
            'title' => 'customer_acquisition_cost = (cost_of_sales + cost_of_marketing) / number_of_new_customers',
            'results' => ['number_of_new_customers' => '(cost_of_marketing + cost_of_sales)/customer_acquisition_cost', 'cost_of_marketing' => '-cost_of_sales + customer_acquisition_cost*number_of_new_customers', 'customer_acquisition_cost' => '(cost_of_marketing + cost_of_sales)/number_of_new_customers', 'cost_of_sales' => '-cost_of_marketing + customer_acquisition_cost*number_of_new_customers'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Customer acquisition cost (CAC) takes Cost of marketing, Cost of sales and Number of new customers and returns Customer acquisition cost (CAC). Nothing is looked up on this page: customer acquisition cost (CAC) is computed from cost of marketing and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Customer acquisition cost (CAC) is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Customer acquisition cost (CAC) calculator works', 'html' => <<<'TXT'
            <p>The Customer acquisition cost (CAC) calculator applies one relationship to 3 numbers and reports Customer acquisition cost (CAC).</p><p>The relationship it solves reads Customer acquisition cost (CAC) = (Cost of marketing + Cost of sales) ÷ Number of new customers.</p><p>The result panel carries Customer acquisition cost (CAC), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Cost of marketing</strong> — in USD</li><li><strong>Cost of sales</strong> — in USD</li><li><strong>Number of new customers</strong> — a plain number, no unit</li></ul><p>The answer comes back as Customer acquisition cost (CAC) in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Cost of marketing = 10 USD, Cost of sales = 100 USD and Number of new customers = 1000; the answers are <strong>Customer acquisition cost (CAC)</strong> = 0.11 USD.</p><ul><li><strong>Customer acquisition cost (CAC)</strong> = 0.11 USD</li></ul><p>That is <strong>Customer acquisition cost (CAC)</strong> = <code>(Cost of marketing + Cost of sales) ÷ Number of new customers</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Customer acquisition cost (CAC)</strong> = 0.11 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Customer acquisition cost (CAC) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Customer acquisition cost (CAC)</strong> = <code>(Cost of marketing + Cost of sales) ÷ Number of new customers</code></li><li><strong>Number of new customers</strong> = <code>(Cost of marketing + Cost of sales) ÷ Customer acquisition cost (CAC)</code></li><li><strong>Cost of marketing</strong> = <code>− Cost of sales + Customer acquisition cost (CAC) × Number of new customers</code></li><li><strong>Cost of sales</strong> = <code>− Cost of marketing + Customer acquisition cost (CAC) × Number of new customers</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Customer acquisition cost (CAC)</strong> = <code>(Cost of marketing + Cost of sales) ÷ Number of new customers</code> — the form to use when Cost of marketing, Cost of sales and Number of new customers are the values you have.</li><li><strong>Number of new customers</strong> = <code>(Cost of marketing + Cost of sales) ÷ Customer acquisition cost (CAC)</code> — the form to use when Cost of marketing, Cost of sales and Customer acquisition cost (CAC) are the values you have.</li><li><strong>Cost of marketing</strong> = <code>− Cost of sales + Customer acquisition cost (CAC) × Number of new customers</code> — the form to use when Cost of sales, Customer acquisition cost (CAC) and Number of new customers are the values you have.</li><li><strong>Cost of sales</strong> = <code>− Cost of marketing + Customer acquisition cost (CAC) × Number of new customers</code> — the form to use when Cost of marketing, Customer acquisition cost (CAC) and Number of new customers are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Customer acquisition cost (CAC), Number of new customers and Cost of marketing can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Cost of marketing, from 10 to 20 — and the answers go from <strong>Customer acquisition cost (CAC)</strong> 0.11 USD to <strong>Customer acquisition cost (CAC)</strong> 0.12 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Customer acquisition cost (CAC) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cost of marketing left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cost of marketing is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Cost of sales left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cost of sales is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of new customers left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of new customers is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Cost of marketing is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Customer acquisition cost (CAC) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Cost of marketing</strong> takes a plain number with no unit attached. The page reads it when it works out Number of new customers, Customer acquisition cost (CAC) and Cost of sales. Fill it from a measurement rather than a memory — Cost of marketing is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost of sales</strong> takes a plain number with no unit attached. The page reads it when it works out Number of new customers, Cost of marketing and Customer acquisition cost (CAC). Fill it from a measurement rather than a memory — Cost of sales is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of new customers</strong> takes a plain number with no unit attached. The page reads it when it works out Cost of marketing, Customer acquisition cost (CAC) and Cost of sales. Fill it from a measurement rather than a memory — Number of new customers is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Customer acquisition cost (CAC)</strong> is a plain number and the page's own defaults put it at 0.11. It is computed from Cost of marketing, Cost of sales and Number of new customers, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Customer acquisition cost (CAC)</th></tr></thead><tbody><tr><td><strong>Cost of marketing</strong> +10%</td><td>+0.91%</td></tr><tr><td><strong>Cost of sales</strong> +10%</td><td>+9.09%</td></tr><tr><td><strong>Number of new customers</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Cost of sales sits at the top — a ten per cent error in that box shows up as roughly 9.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Cost of marketing = 5 USD, Cost of sales = 50 USD and Number of new customers = 500 and the page reports <strong>Customer acquisition cost (CAC)</strong> = 0.11 USD.</li><li>Feed in Cost of marketing = 30 USD, Cost of sales = 100 USD and Number of new customers = 1000 and the page reports <strong>Customer acquisition cost (CAC)</strong> = 0.13 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Customer acquisition cost (CAC) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Cost of marketing, Cost of sales and Number of new customers measured, Customer acquisition cost (CAC) wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/price-per-square-meter">Price per square meter Calculator</a>, <a href="/finance/price-to-book-ratio">Price to book ratio Calculator</a> and <a href="/finance/price-to-cash-flow-ratio">Price to cash flow ratio Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Customer acquisition cost (CAC) is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Cost of marketing, Cost of sales and Number of new customers beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Customer acquisition cost (CAC) calculator work out?', 'a' => <<<'TXT'
            Customer acquisition cost (CAC), from Cost of marketing, Cost of sales and Number of new customers. The relationship is Customer acquisition cost (CAC) = (Cost of marketing + Cost of sales) ÷ Number of new customers.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cost of marketing (USD), Cost of sales (USD), Number of new customers. Enter cost of marketing, cost of sales and number of new customers; Customer acquisition cost (CAC) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Customer acquisition cost (CAC), Number of new customers, Cost of marketing and Cost of sales can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Customer acquisition cost (CAC) = 0.11 USD. The figures come from Cost of marketing as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Customer acquisition cost (CAC) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Cost of marketing blank and the page solves for it, reporting Customer acquisition cost (CAC) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Customer acquisition cost (CAC) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/price-per-square-meter', 'name' => 'Price per square meter Calculator'],
            ['path' => '/finance/price-to-book-ratio', 'name' => 'Price to book ratio Calculator'],
            ['path' => '/finance/price-to-cash-flow-ratio', 'name' => 'Price to cash flow ratio Calculator'],
        ],
        'authors' => [],
    ],
];
