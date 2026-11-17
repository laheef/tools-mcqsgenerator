<?php

/**
 * Bill rate
 * /finance/bill-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bill rate',
    'meta' => ['title' => 'Bill rate Calculator: Formula, Steps & Examples', 'description' => 'Enter annual salary and capacity and get bill rate back. A worked example walks through the arithmetic with this page\'s own numbers. The answer is shown in USD.', 'h1' => 'Bill rate Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_salary',
                            'label' => 'Annual salary',
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
                            'name' => 'capacity',
                            'label' => 'Capacity',
                            'type' => 'number',
                            'help' => 'Number of hours your employee can work in a year.',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2080',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'multiplier',
                            'label' => 'Multiplier',
                            'type' => 'number',
                            'help' => 'Typically larger than 4 to account for overheads and other costs.',
                            'rounding' => ['standard', '0'],
                            'default' => '4',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bill_rate',
                            'label' => 'Bill rate',
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
            'title' => 'bill_rate = (annual_salary / capacity) * multiplier',
            'results' => ['bill_rate' => 'annual_salary*multiplier/capacity', 'capacity' => 'annual_salary*multiplier/bill_rate', 'multiplier' => 'bill_rate*capacity/annual_salary', 'annual_salary' => 'bill_rate*capacity/multiplier'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Bill rate takes Annual salary, Capacity and Multiplier and returns Bill rate. The arithmetic is the whole method: bill rate is worked out from annual salary by one formula, applied once. Bill rate comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Bill rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Bill rate: it takes 3 numbers and reports Bill rate.</p><p>Written with the labels from the form, Bill rate = Annual salary × Multiplier ÷ Capacity.</p><p>The result panel carries Bill rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Annual salary</strong> — in USD</li><li><strong>Capacity</strong> — in hours. Number of hours your employee can work in a year.</li><li><strong>Multiplier</strong> — a plain number, no unit. Typically larger than 4 to account for overheads and other costs.</li></ul><p>What you get back is Bill rate in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Annual salary = 10 USD, Capacity = 2080 hrs and Multiplier = 4 — through the same formula and the panel reports <strong>Bill rate</strong> = 0.0192 USD.</p><ul><li><strong>Bill rate</strong> = 0.0192 USD</li></ul><p>The line behind those figures is <strong>Bill rate</strong> = <code>Annual salary × Multiplier ÷ Capacity</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Bill rate</strong> = 0.0192 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Capacity offers 8 units and opens on hours, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Bill rate</strong> = <code>Annual salary × Multiplier ÷ Capacity</code></li><li><strong>Capacity</strong> = <code>Annual salary × Multiplier ÷ Bill rate</code></li><li><strong>Multiplier</strong> = <code>Bill rate × Capacity ÷ Annual salary</code></li><li><strong>Annual salary</strong> = <code>Bill rate × Capacity ÷ Multiplier</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Bill rate</strong> = <code>Annual salary × Multiplier ÷ Capacity</code> — the form to use when Annual salary, Multiplier and Capacity are the values you have.</li><li><strong>Capacity</strong> = <code>Annual salary × Multiplier ÷ Bill rate</code> — the form to use when Annual salary, Multiplier and Bill rate are the values you have.</li><li><strong>Multiplier</strong> = <code>Bill rate × Capacity ÷ Annual salary</code> — the form to use when Bill rate, Capacity and Annual salary are the values you have.</li><li><strong>Annual salary</strong> = <code>Bill rate × Capacity ÷ Multiplier</code> — the form to use when Bill rate, Capacity and Multiplier are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Bill rate, Capacity and Multiplier can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Annual salary, from 10 to 20 — and the answers go from <strong>Bill rate</strong> 0.0192 USD to <strong>Bill rate</strong> 0.0385 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Capacity is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Bill rate is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Annual salary left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Annual salary is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Capacity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Capacity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Annual salary to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Annual salary</strong> takes a plain number with no unit attached. The page reads it when it works out Bill rate, Capacity and Multiplier. Have it to hand before you start: Annual salary is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Capacity</strong> is a hours quantity: the page opens it in hrs and converts anything else you pick before the formula runs. Number of hours your employee can work in a year. The page reads it when it works out Bill rate, Multiplier and Annual salary. Have it to hand before you start: Capacity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Multiplier</strong> takes a plain number with no unit attached. Typically larger than 4 to account for overheads and other costs. The page reads it when it works out Bill rate, Capacity and Annual salary. Have it to hand before you start: Multiplier is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Bill rate</strong> is a plain number and the page's own defaults put it at 0.0192. The value follows from Annual salary, Multiplier and Capacity. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Bill rate</th></tr></thead><tbody><tr><td><strong>Annual salary</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Capacity</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Multiplier</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Annual salary sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Annual salary = 5 USD, Capacity = 1040 hrs and Multiplier = 2, the answer is <strong>Bill rate</strong> = 0.0096 USD.</li><li>With Annual salary = 30 USD, Capacity = 2080 hrs and Multiplier = 4, the answer is <strong>Bill rate</strong> = 0.0577 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>hours</strong> — opens in <em>hrs</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Bill rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover hours. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Annual salary, Capacity and Multiplier is what you already know and Bill rate is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/eoq">Economic order quantity (EOQ) Calculator</a>, <a href="/finance/economic-profit">Economic profit Calculator</a> and <a href="/finance/economic-value-added">Economic value added Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Bill rate is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Annual salary, Capacity and Multiplier beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bill rate calculator work out?', 'a' => 'Bill rate, from Annual salary, Multiplier and Capacity. The relationship is Bill rate = Annual salary × Multiplier ÷ Capacity.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Annual salary (USD), Capacity (hours), Multiplier. Fill annual salary, capacity and multiplier and leave Bill rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Bill rate, Capacity, Multiplier and Annual salary can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Bill rate = 0.0192 USD. Those are the defaults written into the form — move Annual salary and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Bill rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Annual salary left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Bill rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/eoq', 'name' => 'Economic order quantity (EOQ) Calculator'],
            ['path' => '/finance/economic-profit', 'name' => 'Economic profit Calculator'],
            ['path' => '/finance/economic-value-added', 'name' => 'Economic value added Calculator'],
        ],
        'authors' => [],
    ],
];
