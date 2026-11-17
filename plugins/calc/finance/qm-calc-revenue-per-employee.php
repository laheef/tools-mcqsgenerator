<?php

/**
 * Revenue per employee
 * /finance/revenue-per-employee
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Revenue per employee',
    'meta' => ['title' => 'Revenue per employee — Free Online Calculator', 'description' => 'Enter revenue and number of employee and get revenue per employee back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Revenue per employee Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
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
                            'name' => 'num_of_employee',
                            'label' => 'Number of employee',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue_per_employee',
                            'label' => 'Revenue per employee',
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
            'title' => 'revenue_per_employee = revenue / num_of_employee',
            'results' => ['num_of_employee' => 'revenue/revenue_per_employee', 'revenue_per_employee' => 'revenue/num_of_employee', 'revenue' => 'num_of_employee*revenue_per_employee'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Revenue per employee turns Revenue and Number of employee into Revenue per employee. It is a single relationship that reads revenue per employee out of revenue, not a table of canned results keyed by them. Units for Revenue per employee default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Revenue per employee calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Revenue per employee: it takes 2 numbers and reports Revenue per employee.</p><p>Written with the labels from the form, Revenue per employee = Revenue ÷ Number of employee.</p><p>The result panel carries Revenue per employee, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Revenue</strong> — in USD</li><li><strong>Number of employee</strong> — a plain number, no unit</li></ul><p>The result box is Revenue per employee in USD. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Revenue = 10 USD and Number of employee = 100 — through the same formula and the panel reports <strong>Revenue per employee</strong> = 0.1 USD.</p><ul><li><strong>Revenue per employee</strong> = 0.1 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Revenue per employee</strong> = <code>Revenue ÷ Number of employee</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Revenue per employee</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Revenue per employee takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Revenue per employee</strong> = <code>Revenue ÷ Number of employee</code></li><li><strong>Number of employee</strong> = <code>Revenue ÷ Revenue per employee</code></li><li><strong>Revenue</strong> = <code>Number of employee × Revenue per employee</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Revenue per employee</strong> = <code>Revenue ÷ Number of employee</code> — the form to use when Revenue and Number of employee are the values you have.</li><li><strong>Number of employee</strong> = <code>Revenue ÷ Revenue per employee</code> — the form to use when Revenue and Revenue per employee are the values you have.</li><li><strong>Revenue</strong> = <code>Number of employee × Revenue per employee</code> — the form to use when Number of employee and Revenue per employee are the values you have.</li></ul><p>Any one of Revenue per employee, Number of employee and Revenue can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Revenue from 10 to 20, leaving every other box alone. The panel moves from <strong>Revenue per employee</strong> 0.1 USD to <strong>Revenue per employee</strong> 0.2 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Revenue per employee is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Revenue left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Revenue is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of employee left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of employee is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Revenue to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Revenue per employee form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Revenue</strong> takes a plain number with no unit attached. The page reads it when it works out Number of employee and Revenue per employee. Fill it from a measurement rather than a memory — Revenue is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of employee</strong> takes a plain number with no unit attached. The page reads it when it works out Revenue per employee and Revenue. Fill it from a measurement rather than a memory — Number of employee is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Revenue per employee</strong> is a plain number and the page's own defaults put it at 0.1. It is worked out from Revenue and Number of employee. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Revenue per employee</th></tr></thead><tbody><tr><td><strong>Revenue</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of employee</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Revenue sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Revenue = 5 USD and Number of employee = 50 and the page reports <strong>Revenue per employee</strong> = 0.1 USD.</li><li>Feed in Revenue = 30 USD and Number of employee = 100 and the page reports <strong>Revenue per employee</strong> = 0.3 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Revenue and Number of employee ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Revenue — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Revenue per employee in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Revenue per employee follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Revenue and Number of employee and the number you are missing is Revenue per employee.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/cost-of-doing-business">Cost of doing business</a>, <a href="/finance/cost-of-equity">Cost of equity</a> and <a href="/finance/cogs">Cost of goods sold Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Revenue per employee is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Revenue per employee calculator work out?', 'a' => 'Revenue per employee, from Revenue and Number of employee. The relationship is Revenue per employee = Revenue ÷ Number of employee.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Revenue (USD), Number of employee. With revenue and number of employee in place, Revenue per employee can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Revenue per employee, Number of employee and Revenue blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Revenue per employee = 0.1 USD. Those are the defaults written into the form — move Revenue and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Revenue per employee is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Revenue blank and the page solves for it, reporting Revenue per employee instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Revenue per employee keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/cost-of-doing-business', 'name' => 'Cost of doing business'],
            ['path' => '/finance/cost-of-equity', 'name' => 'Cost of equity'],
            ['path' => '/finance/cogs', 'name' => 'Cost of goods sold Calculator'],
        ],
        'authors' => [],
    ],
];
