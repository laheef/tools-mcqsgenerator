<?php

/**
 * Average fixed cost
 * /finance/average-fixed-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Average fixed cost',
    'meta' => ['title' => 'Average fixed cost Calculator: Free, With Steps', 'description' => 'Enter total fixed cost and number of units and get average fixed cost back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Average fixed cost Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_fixed_cost',
                            'label' => 'Total fixed cost',
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
                            'name' => 'number_of_units',
                            'label' => 'Number of units',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'average_fixed_cost',
                            'label' => 'Average fixed cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'average_fixed_cost = total_fixed_cost / number_of_units',
            'results' => ['average_fixed_cost' => 'total_fixed_cost/number_of_units', 'number_of_units' => 'total_fixed_cost/average_fixed_cost', 'total_fixed_cost' => 'average_fixed_cost*number_of_units'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Average fixed cost takes Total fixed cost and Number of units and returns Average fixed cost. The arithmetic is the whole method: average fixed cost is worked out from total fixed cost by one formula, applied once. Average fixed cost comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Average fixed cost calculator works', 'html' => <<<'TXT'
            <p>Average fixed cost answers one question from 2 numbers, and the answer is Average fixed cost.</p><p>The relationship it solves reads Average fixed cost = Total fixed cost ÷ Number of units.</p><p>The answers are Average fixed cost; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Total fixed cost</strong> — in USD</li><li><strong>Number of units</strong> — a plain number, no unit</li></ul><p>The answer comes back as Average fixed cost in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Total fixed cost = 10 USD and Number of units = 100; the answers are <strong>Average fixed cost</strong> = 0.1 USD.</p><ul><li><strong>Average fixed cost</strong> = 0.1 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Average fixed cost</strong> = <code>Total fixed cost ÷ Number of units</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Average fixed cost</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Average fixed cost takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Average fixed cost</strong> = <code>Total fixed cost ÷ Number of units</code></li><li><strong>Number of units</strong> = <code>Total fixed cost ÷ Average fixed cost</code></li><li><strong>Total fixed cost</strong> = <code>Average fixed cost × Number of units</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Average fixed cost</strong> = <code>Total fixed cost ÷ Number of units</code> — the form to use when Total fixed cost and Number of units are the values you have.</li><li><strong>Number of units</strong> = <code>Total fixed cost ÷ Average fixed cost</code> — the form to use when Total fixed cost and Average fixed cost are the values you have.</li><li><strong>Total fixed cost</strong> = <code>Average fixed cost × Number of units</code> — the form to use when Average fixed cost and Number of units are the values you have.</li></ul><p>Any one of Average fixed cost, Number of units and Total fixed cost can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Total fixed cost, from 10 to 20 — and the answers go from <strong>Average fixed cost</strong> 0.1 USD to <strong>Average fixed cost</strong> 0.2 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Average fixed cost is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Total fixed cost left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total fixed cost is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of units left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of units is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Total fixed cost to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Average fixed cost form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total fixed cost</strong> takes a plain number with no unit attached. The page reads it when it works out Average fixed cost and Number of units. Fill it from a measurement rather than a memory — Total fixed cost is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of units</strong> takes a plain number with no unit attached. The page reads it when it works out Average fixed cost and Total fixed cost. Fill it from a measurement rather than a memory — Number of units is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Average fixed cost</strong> is a plain number and the page's own defaults put it at 0.1. It is computed from Total fixed cost and Number of units, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Average fixed cost</th></tr></thead><tbody><tr><td><strong>Total fixed cost</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of units</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Total fixed cost sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Total fixed cost = 5 USD and Number of units = 50 and the page reports <strong>Average fixed cost</strong> = 0.1 USD.</li><li>Feed in Total fixed cost = 30 USD and Number of units = 100 and the page reports <strong>Average fixed cost</strong> = 0.3 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Total fixed cost and Number of units ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Total fixed cost — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Average fixed cost in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Average fixed cost follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total fixed cost and Number of units are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Total fixed cost and Number of units is what you already know and Average fixed cost is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/operating-cash-flow-ratio">Operating cash flow ratio Calculator</a>, <a href="/finance/operating-cash-flow">Operating cash flow</a> and <a href="/finance/operating-margin">Operating margin Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Average fixed cost is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Average fixed cost calculator work out?', 'a' => 'Average fixed cost, from Total fixed cost and Number of units. The relationship is Average fixed cost = Total fixed cost ÷ Number of units.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total fixed cost (USD), Number of units. Fill total fixed cost and number of units and leave Average fixed cost empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Average fixed cost, Number of units and Total fixed cost blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Average fixed cost = 0.1 USD. That comes from the page\'s own defaults, entered in Total fixed cost; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Average fixed cost is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total fixed cost blank and the page solves for it, reporting Average fixed cost instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Average fixed cost keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/operating-cash-flow-ratio', 'name' => 'Operating cash flow ratio Calculator'],
            ['path' => '/finance/operating-cash-flow', 'name' => 'Operating cash flow'],
            ['path' => '/finance/operating-margin', 'name' => 'Operating margin Calculator'],
        ],
        'authors' => [],
    ],
];
