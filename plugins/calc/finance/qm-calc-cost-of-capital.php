<?php

/**
 * Cost of capital
 * /finance/cost-of-capital
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cost of capital',
    'meta' => ['title' => 'Cost of capital Calculator — Formula, Units & Example', 'description' => 'Enter cost of debt and cost of equity and get cost of capital back. Every box can be solved for, not only the one in the title. A worked example follows.', 'h1' => 'Cost of capital Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_of_debt',
                            'label' => 'Cost of debt',
                            'type' => 'number',
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
                            'name' => 'cost_of_equity',
                            'label' => 'Cost of equity',
                            'type' => 'number',
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
                            'name' => 'cost_of_capital',
                            'label' => 'Cost of capital',
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
            'title' => 'cost_of_capital = cost_of_equity + cost_of_debt',
            'results' => ['cost_of_capital' => 'cost_of_debt + cost_of_equity', 'cost_of_debt' => 'cost_of_capital - cost_of_equity', 'cost_of_equity' => 'cost_of_capital - cost_of_debt'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cost of capital turns Cost of debt and Cost of equity into Cost of capital. There is no hidden constant here: change cost of capital and cost of debt moves with it. The main result, Cost of capital, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Cost of capital calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cost of capital: it takes 2 numbers and reports Cost of capital.</p><p>The relationship it solves reads Cost of capital = Cost of debt + Cost of equity.</p><p>What comes back is Cost of capital — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Cost of debt</strong> — in percent</li><li><strong>Cost of equity</strong> — in percent</li></ul><p>The result box is Cost of capital in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Cost of debt = 10 perc and Cost of equity = 100 perc gives <strong>Cost of capital</strong> = 110 perc.</p><ul><li><strong>Cost of capital</strong> = 110 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Cost of capital</strong> = <code>Cost of debt + Cost of equity</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Cost of capital</strong> = 110 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Cost of capital offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cost of capital</strong> = <code>Cost of debt + Cost of equity</code></li><li><strong>Cost of debt</strong> = <code>Cost of capital − Cost of equity</code></li><li><strong>Cost of equity</strong> = <code>Cost of capital − Cost of debt</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Cost of capital</strong> = <code>Cost of debt + Cost of equity</code> — the form to use when Cost of debt and Cost of equity are the values you have.</li><li><strong>Cost of debt</strong> = <code>Cost of capital − Cost of equity</code> — the form to use when Cost of capital and Cost of equity are the values you have.</li><li><strong>Cost of equity</strong> = <code>Cost of capital − Cost of debt</code> — the form to use when Cost of capital and Cost of debt are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cost of capital, Cost of debt and Cost of equity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Cost of debt from 10 to 20, leaving every other box alone. The panel moves from <strong>Cost of capital</strong> 110 perc to <strong>Cost of capital</strong> 120 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Cost of debt and Cost of equity is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cost of capital is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cost of debt left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cost of debt is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Cost of equity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cost of equity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Cost of debt is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cost of capital form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Cost of debt</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Cost of capital and Cost of equity. Fill it from a measurement rather than a memory — Cost of debt is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cost of equity</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Cost of capital and Cost of debt. Fill it from a measurement rather than a memory — Cost of equity is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Cost of capital</strong> is a percent figure and the page's own defaults put it at 110 perc. It is worked out from Cost of debt and Cost of equity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cost of capital</th></tr></thead><tbody><tr><td><strong>Cost of debt</strong> +10%</td><td>+0.91%</td></tr><tr><td><strong>Cost of equity</strong> +10%</td><td>+9.09%</td></tr></tbody></table><p>Ranked by leverage, Cost of equity sits at the top — a ten per cent error in that box shows up as roughly 9.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Cost of debt = 5 perc and Cost of equity = 50 perc and the page reports <strong>Cost of capital</strong> = 55 perc.</li><li>Feed in Cost of debt = 30 perc and Cost of equity = 100 perc and the page reports <strong>Cost of capital</strong> = 130 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Cost of capital actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Cost of debt and Cost of equity ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Cost of debt — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Cost of capital in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cost of capital follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cost of debt and Cost of equity are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Cost of debt and Cost of equity measured, Cost of capital wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/cac">Customer acquisition cost (CAC) Calculator</a>, <a href="/finance/customer-effort-score">Customer effort score Calculator</a> and <a href="/finance/customer-retention-rate">Customer retention rate</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cost of capital calculator work out?', 'a' => 'Cost of capital, from Cost of debt and Cost of equity. The relationship is Cost of capital = Cost of debt + Cost of equity.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cost of debt (percent), Cost of equity (percent). With cost of debt and cost of equity in place, Cost of capital can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Cost of capital, Cost of debt and Cost of equity can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Cost of capital = 110 perc. The figures come from Cost of debt as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Cost of capital is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cost of debt blank and the page solves for it, reporting Cost of capital instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cost of capital keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/cac', 'name' => 'Customer acquisition cost (CAC) Calculator'],
            ['path' => '/finance/customer-effort-score', 'name' => 'Customer effort score Calculator'],
            ['path' => '/finance/customer-retention-rate', 'name' => 'Customer retention rate'],
        ],
        'authors' => [],
    ],
];
