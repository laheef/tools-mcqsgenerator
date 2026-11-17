<?php

/**
 * Day sales outstanding (DSO)
 * /finance/days-sales-outstanding
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Day sales outstanding (DSO)',
    'meta' => ['title' => 'Day sales outstanding (DSO) — Formula & Results', 'description' => 'Day sales outstanding (DSO) works out average receivables and Days sales outstanding (DSO) from beginning accounts receivable and end accounts receivable.', 'h1' => 'Day sales outstanding (DSO) Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => 'Receivables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beg_receivables',
                            'label' => 'Beginning accounts receivable',
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
                            'name' => 'end_receivables',
                            'label' => 'End accounts receivable',
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
                            'name' => 'avg_receivables',
                            'label' => 'Average receivables',
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
            'title' => 'Sales',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sales',
                            'label' => 'Total sales',
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
                            'name' => 'days',
                            'label' => 'Accounting period',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '365',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dso',
                            'label' => 'Days sales outstanding (DSO)',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'dso = (avg_receivables / sales) * days',
            'results' => ['avg_receivables' => 'dso*sales/days', 'days' => 'dso*sales/avg_receivables', 'dso' => 'avg_receivables*days/sales', 'sales' => 'avg_receivables*days/dso'],
        ],
        [
            'title' => 'avg_receivables = (beg_receivables + end_receivables) / 2',
            'results' => ['end_receivables' => '2*avg_receivables - beg_receivables', 'avg_receivables' => '(1/2)*beg_receivables + (1/2)*end_receivables', 'beg_receivables' => '2*avg_receivables - end_receivables'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Day sales outstanding (DSO) turns Average receivables, Total sales and Accounting period into Beginning accounts receivable and End accounts receivable. It is a single relationship that reads beginning accounts receivable out of average receivables, not a table of canned results keyed by them. Units for Beginning accounts receivable default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Day sales outstanding (DSO) calculator works', 'html' => <<<'TXT'
            <p>The Day sales outstanding (DSO) calculator applies one relationship to 3 numbers and reports Beginning accounts receivable, End accounts receivable and Days sales outstanding (DSO).</p><p>In the form&#039;s own words, Days sales outstanding (DSO) = Average receivables × Accounting period ÷ Total sales.</p><p>What comes back is Beginning accounts receivable, End accounts receivable and Days sales outstanding (DSO) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Average receivables</strong> — in USD</li><li><strong>Total sales</strong> — in USD</li><li><strong>Accounting period</strong> — in days</li></ul><p>The result boxes are Beginning accounts receivable in USD, End accounts receivable in USD, Days sales outstanding (DSO) in days; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Beginning accounts receivable = 10 USD, End accounts receivable = 100 USD, Total sales = 1000 USD, Accounting period = 365 days and Days sales outstanding (DSO) = 100 days — through the same formula and the panel reports <strong>Average receivables</strong> = 274 USD.</p><ul><li><strong>Average receivables</strong> = 274 USD</li></ul><p>The line behind those figures is <strong>Days sales outstanding (DSO)</strong> = <code>Average receivables × Accounting period ÷ Total sales</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Average receivables</strong> = 274 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Days sales outstanding (DSO) offers 6 units and opens on days, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Days sales outstanding (DSO)</strong> = <code>Average receivables × Accounting period ÷ Total sales</code></li><li><strong>Average receivables</strong> = <code>Days sales outstanding (DSO) × Total sales ÷ Accounting period</code></li><li><strong>Accounting period</strong> = <code>Days sales outstanding (DSO) × Total sales ÷ Average receivables</code></li><li><strong>Total sales</strong> = <code>Average receivables × Accounting period ÷ Days sales outstanding (DSO)</code></li><li><strong>End accounts receivable</strong> = <code>2 × Average receivables − Beginning accounts receivable</code></li><li><strong>Beginning accounts receivable</strong> = <code>2 × Average receivables − End accounts receivable</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Days sales outstanding (DSO)</strong> = <code>Average receivables × Accounting period ÷ Total sales</code> — the form to use when Average receivables, Accounting period and Total sales are the values you have.</li><li><strong>Average receivables</strong> = <code>Days sales outstanding (DSO) × Total sales ÷ Accounting period</code> — the form to use when Days sales outstanding (DSO), Total sales and Accounting period are the values you have.</li><li><strong>Accounting period</strong> = <code>Days sales outstanding (DSO) × Total sales ÷ Average receivables</code> — the form to use when Days sales outstanding (DSO), Total sales and Average receivables are the values you have.</li><li><strong>Total sales</strong> = <code>Average receivables × Accounting period ÷ Days sales outstanding (DSO)</code> — the form to use when Average receivables, Accounting period and Days sales outstanding (DSO) are the values you have.</li><li><strong>Average receivables</strong> = <code>(1 ÷ 2) × Beginning accounts receivable + (1 ÷ 2) × End accounts receivable</code> — the form to use when Beginning accounts receivable and End accounts receivable are the values you have.</li><li><strong>End accounts receivable</strong> = <code>2 × Average receivables − Beginning accounts receivable</code> — the form to use when Average receivables and Beginning accounts receivable are the values you have.</li><li><strong>Beginning accounts receivable</strong> = <code>2 × Average receivables − End accounts receivable</code> — the form to use when Average receivables and End accounts receivable are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Days sales outstanding (DSO), Average receivables and Accounting period can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Beginning accounts receivable from 10 to 20, leaving every other box alone. The panel moves from <strong>Average receivables</strong> 274 USD to <strong>Average receivables</strong> 274 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Accounting period is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Beginning accounts receivable, End accounts receivable and Days sales outstanding (DSO) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Average receivables left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average receivables is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total sales left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total sales is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Average receivables to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Average receivables</strong> takes a plain number with no unit attached. It feeds Accounting period, Days sales outstanding (DSO) and Total sales. Have it to hand before you start: Average receivables is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total sales</strong> takes a plain number with no unit attached. It feeds Average receivables, Accounting period and Days sales outstanding (DSO). Have it to hand before you start: Total sales is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Accounting period</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. It feeds Average receivables, Days sales outstanding (DSO) and Total sales. Have it to hand before you start: Accounting period is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Beginning accounts receivable</strong> is a plain number. It is computed from Average receivables and End accounts receivable, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>End accounts receivable</strong> is a plain number. It is computed from Average receivables and Beginning accounts receivable, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Days sales outstanding (DSO)</strong> is a days figure. It is computed from Average receivables, Accounting period and Total sales, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Average receivables</th></tr></thead><tbody><tr><td><strong>Beginning accounts receivable</strong> +10%</td><td>+0%</td></tr><tr><td><strong>End accounts receivable</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Total sales</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Accounting period</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Days sales outstanding (DSO)</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Total sales sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Beginning accounts receivable and End accounts receivable barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Beginning accounts receivable = 5 USD, End accounts receivable = 50 USD, Total sales = 500 USD, Accounting period = 183 days and Days sales outstanding (DSO) = 50 days, the answer is <strong>Average receivables</strong> = 137 USD.</li><li>With Beginning accounts receivable = 30 USD, End accounts receivable = 100 USD, Total sales = 1000 USD, Accounting period = 365 days and Days sales outstanding (DSO) = 100 days, the answer is <strong>Average receivables</strong> = 274 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>days</strong> — opens in <em>days</em>, and the chip also carries hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Beginning accounts receivable follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are days and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Average receivables, Total sales and Accounting period are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Average receivables, Total sales and Accounting period measured, Beginning accounts receivable and End accounts receivable wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/forward-premium">Forward premium</a>, <a href="/finance/forward-rate">Forward rate Calculator</a> and <a href="/finance/free-cash-flow">Free cash flow Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Day sales outstanding (DSO) calculator work out?', 'a' => <<<'TXT'
            Beginning accounts receivable, End accounts receivable and Days sales outstanding (DSO), from Average receivables, Accounting period and Total sales. The relationship is Days sales outstanding (DSO) = Average receivables × Accounting period ÷ Total sales.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Average receivables (USD), Total sales (USD), Accounting period (days). With average receivables, total sales and accounting period in place, Beginning accounts receivable can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Days sales outstanding (DSO), Average receivables, Accounting period and Total sales can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Average receivables = 274 USD. The figures come from Average receivables as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Beginning accounts receivable is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Average receivables left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Beginning accounts receivable keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/forward-premium', 'name' => 'Forward premium'],
            ['path' => '/finance/forward-rate', 'name' => 'Forward rate Calculator'],
            ['path' => '/finance/free-cash-flow', 'name' => 'Free cash flow Calculator'],
        ],
        'authors' => [],
    ],
];
