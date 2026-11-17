<?php

/**
 * Net profit margin
 * /finance/net-profit-margin
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net profit margin',
    'meta' => ['title' => 'Net profit margin Calculator: Free, With Steps', 'description' => 'Enter net profit and total revenues and get net profit margin back. A worked example follows. Results come back in perc, with any other unit a click away.', 'h1' => 'Net profit margin Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_profit',
                            'label' => 'Net profit',
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
                            'name' => 'total_revenues',
                            'label' => 'Total revenues',
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
                            'name' => 'net_profit_margin',
                            'label' => 'Net profit margin',
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
            'title' => 'net_profit_margin = net_profit / total_revenues',
            'results' => ['total_revenues' => 'net_profit/net_profit_margin', 'net_profit_margin' => 'net_profit/total_revenues', 'net_profit' => 'net_profit_margin*total_revenues'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Net profit margin takes Net profit and Total revenues and returns Net profit margin. Nothing is looked up on this page: net profit margin is computed from net profit and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Net profit margin is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Net profit margin calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Net profit margin: it takes 2 numbers and reports Net profit margin.</p><p>Written with the labels from the form, Net profit margin = Net profit ÷ Total revenues.</p><p>The answers are Net profit margin; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Net profit</strong> — in USD</li><li><strong>Total revenues</strong> — in USD</li></ul><p>The answer comes back as Net profit margin in percent. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Net profit = 10 USD and Total revenues = 100 USD — through the same formula and the panel reports <strong>Net profit margin</strong> = 0.1 perc.</p><ul><li><strong>Net profit margin</strong> = 0.1 perc</li></ul><p>That is <strong>Net profit margin</strong> = <code>Net profit ÷ Total revenues</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Net profit margin</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Net profit margin offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Net profit margin</strong> = <code>Net profit ÷ Total revenues</code></li><li><strong>Total revenues</strong> = <code>Net profit ÷ Net profit margin</code></li><li><strong>Net profit</strong> = <code>Net profit margin × Total revenues</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Net profit margin</strong> = <code>Net profit ÷ Total revenues</code> — the form to use when Net profit and Total revenues are the values you have.</li><li><strong>Total revenues</strong> = <code>Net profit ÷ Net profit margin</code> — the form to use when Net profit and Net profit margin are the values you have.</li><li><strong>Net profit</strong> = <code>Net profit margin × Total revenues</code> — the form to use when Net profit margin and Total revenues are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Net profit margin, Total revenues and Net profit can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Net profit, from 10 to 20 — and the answers go from <strong>Net profit margin</strong> 0.1 perc to <strong>Net profit margin</strong> 0.2 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Net profit margin is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Net profit left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net profit is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total revenues left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total revenues is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Net profit to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Net profit</strong> takes a plain number with no unit attached. The page reads it when it works out Total revenues and Net profit margin. Have it to hand before you start: Net profit is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total revenues</strong> takes a plain number with no unit attached. The page reads it when it works out Net profit margin and Net profit. Have it to hand before you start: Total revenues is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Net profit margin</strong> is a percent figure and the page's own defaults put it at 0.1 perc. It is worked out from Net profit and Total revenues. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Net profit margin</th></tr></thead><tbody><tr><td><strong>Net profit</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Total revenues</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Net profit sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Net profit = 5 USD and Total revenues = 50 USD, the answer is <strong>Net profit margin</strong> = 0.1 perc.</li><li>With Net profit = 30 USD and Total revenues = 100 USD, the answer is <strong>Net profit margin</strong> = 0.3 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Net profit and Total revenues. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Net profit into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Net profit margin in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Net profit margin follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Net profit and Total revenues are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Net profit and Total revenues measured, Net profit margin wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/child-tax-credit">Child tax credit Calculator</a>, <a href="/finance/churn-rate">Churn rate Calculator</a> and <a href="/finance/cltv">CLTV (customer lifetime value)</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net profit margin calculator work out?', 'a' => 'Net profit margin, from Net profit and Total revenues. The relationship is Net profit margin = Net profit ÷ Total revenues.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Net profit (USD), Total revenues (USD). With net profit and total revenues in place, Net profit margin can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Net profit margin, Total revenues and Net profit can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Net profit margin = 0.1 perc. That comes from the page\'s own defaults, entered in Net profit; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Net profit margin is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Net profit left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Net profit margin at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/child-tax-credit', 'name' => 'Child tax credit Calculator'],
            ['path' => '/finance/churn-rate', 'name' => 'Churn rate Calculator'],
            ['path' => '/finance/cltv', 'name' => 'CLTV (customer lifetime value)'],
        ],
        'authors' => [],
    ],
];
