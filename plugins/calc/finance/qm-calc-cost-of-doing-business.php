<?php

/**
 * Cost of doing business
 * /finance/cost-of-doing-business
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cost of doing business',
    'meta' => ['title' => 'Cost of doing business — Free Online Calculator', 'description' => 'Enter total annual cost and total billable days per year and get cost of doing business back. Every box can be solved for, not only the one in the title.', 'h1' => 'Cost of doing business Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_annual_cost',
                            'label' => 'Total annual cost',
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
                            'name' => 'total_billable_days',
                            'label' => 'Total billable days per year',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_business',
                            'label' => 'Cost of doing business',
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
            'title' => 'cost_business = total_annual_cost / total_billable_days',
            'results' => ['cost_business' => 'total_annual_cost/total_billable_days', 'total_billable_days' => 'total_annual_cost/cost_business', 'total_annual_cost' => 'cost_business*total_billable_days'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cost of doing business turns Total annual cost and Total billable days per year into Cost of doing business. Nothing is looked up on this page: cost of doing business is computed from total annual cost and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Cost of doing business is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Cost of doing business calculator works', 'html' => <<<'TXT'
            <p>Cost of doing business answers one question from 2 numbers, and the answer is Cost of doing business.</p><p>The relationship it solves reads Cost of doing business = Total annual cost ÷ Total billable days per year.</p><p>What comes back is Cost of doing business — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Total annual cost</strong> — in USD</li><li><strong>Total billable days per year</strong> — in days</li></ul><p>What you get back is Cost of doing business in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Total annual cost = 10 USD and Total billable days per year = 100 days; the answers are <strong>Cost of doing business</strong> = 0.1 USD.</p><ul><li><strong>Cost of doing business</strong> = 0.1 USD</li></ul><p>That is <strong>Cost of doing business</strong> = <code>Total annual cost ÷ Total billable days per year</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Cost of doing business</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Total billable days per year offers 6 units and opens on days, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cost of doing business</strong> = <code>Total annual cost ÷ Total billable days per year</code></li><li><strong>Total billable days per year</strong> = <code>Total annual cost ÷ Cost of doing business</code></li><li><strong>Total annual cost</strong> = <code>Cost of doing business × Total billable days per year</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cost of doing business</strong> = <code>Total annual cost ÷ Total billable days per year</code> — the form to use when Total annual cost and Total billable days per year are the values you have.</li><li><strong>Total billable days per year</strong> = <code>Total annual cost ÷ Cost of doing business</code> — the form to use when Total annual cost and Cost of doing business are the values you have.</li><li><strong>Total annual cost</strong> = <code>Cost of doing business × Total billable days per year</code> — the form to use when Cost of doing business and Total billable days per year are the values you have.</li></ul><p>Any one of Cost of doing business, Total billable days per year and Total annual cost can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Total annual cost, from 10 to 20 — and the answers go from <strong>Cost of doing business</strong> 0.1 USD to <strong>Cost of doing business</strong> 0.2 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Total billable days per year is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cost of doing business is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total annual cost left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total annual cost is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total billable days per year left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total billable days per year is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Total annual cost and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Total annual cost</strong> takes a plain number with no unit attached. The page reads it when it works out Cost of doing business and Total billable days per year. Have it to hand before you start: Total annual cost is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total billable days per year</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. The page reads it when it works out Cost of doing business and Total annual cost. Have it to hand before you start: Total billable days per year is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cost of doing business</strong> is a plain number and the page's own defaults put it at 0.1. It is worked out from Total annual cost and Total billable days per year. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cost of doing business</th></tr></thead><tbody><tr><td><strong>Total annual cost</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Total billable days per year</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Total annual cost sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Total annual cost = 5 USD and Total billable days per year = 50 days, the answer is <strong>Cost of doing business</strong> = 0.1 USD.</li><li>With Total annual cost = 30 USD and Total billable days per year = 100 days, the answer is <strong>Cost of doing business</strong> = 0.3 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cost of doing business follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover days. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Total annual cost and Total billable days per year measured, Cost of doing business wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/national-insurance-uk">National insurance UK</a>, <a href="/finance/natural-rate-of-unemployment">Natural rate of unemployment Calculator</a> and <a href="/finance/nav">Net asset value (NAV)</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cost of doing business calculator work out?', 'a' => <<<'TXT'
            Cost of doing business, from Total annual cost and Total billable days per year. The relationship is Cost of doing business = Total annual cost ÷ Total billable days per year.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total annual cost (USD), Total billable days per year (days). Enter total annual cost and total billable days per year; Cost of doing business is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Cost of doing business, Total billable days per year and Total annual cost blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Cost of doing business = 0.1 USD. The figures come from Total annual cost as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Cost of doing business is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total annual cost left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cost of doing business keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/national-insurance-uk', 'name' => 'National insurance UK'],
            ['path' => '/finance/natural-rate-of-unemployment', 'name' => 'Natural rate of unemployment Calculator'],
            ['path' => '/finance/nav', 'name' => 'Net asset value (NAV)'],
        ],
        'authors' => [],
    ],
];
