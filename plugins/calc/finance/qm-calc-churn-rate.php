<?php

/**
 * Churn rate
 * /finance/churn-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Churn rate',
    'meta' => ['title' => 'Churn rate Calculator: Formula, Steps & Examples', 'description' => 'Churn rate takes costumers at start of a period and returns customer lifetime. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Churn rate Calculator', 'updated' => '2025-10-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'customers_start_period',
                            'label' => 'Costumers at start of a period',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'customers_lost_during_period',
                            'label' => 'Customers lost during period',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'churn_rate',
                            'label' => 'Churn rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lifetime',
                            'label' => 'Customer lifetime',
                            'type' => 'number',
                            'suffix' => ' periods',
                            'help' => <<<'TXT'
                            The units of customer lifetime depend on the period you're considering above. If you calculate the monthly churn rate, the customer lifetime is expressed in months; periods are years if you estimate the yearly churn rate.
                            TXT,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'churn_rate =  customers_lost_during_period / customers_start_period * 100',
            'results' => ['customers_lost_during_period' => '(1/100)*churn_rate*customers_start_period', 'customers_start_period' => '100*customers_lost_during_period/churn_rate', 'churn_rate' => '100*customers_lost_during_period/customers_start_period'],
        ],
        [
            'title' => 'lifetime = 1 / churn_rate * 100',
            'results' => ['lifetime' => '100/churn_rate', 'churn_rate' => '100/lifetime'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Churn rate works out Churn rate and Customer lifetime from Costumers at start of a period and Customers lost during period. Nothing is looked up on this page: churn rate is computed from costumers at start of a period and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Churn rate is opened in %; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Churn rate calculator works', 'html' => <<<'TXT'
            <p>Churn rate answers one question from 2 numbers, and the answer is Churn rate and Customer lifetime.</p><p>Written with the labels from the form, Churn rate = 100 × Customers lost during period ÷ Costumers at start of a period.</p><p>The result panel carries Churn rate and Customer lifetime, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Costumers at start of a period</strong> — a plain number, no unit</li><li><strong>Customers lost during period</strong> — a plain number, no unit</li></ul><p>The result boxes are Churn rate in %, Customer lifetime in periods; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Costumers at start of a period = 10 and Customers lost during period = 100 — through the same formula and the panel reports <strong>Churn rate</strong> = 1000 % and <strong>Customer lifetime</strong> = 0.1 periods.</p><ul><li><strong>Churn rate</strong> = 1000 %</li><li><strong>Customer lifetime</strong> = 0.1 periods</li></ul><p>The line behind those figures is <strong>Churn rate</strong> = <code>100 × Customers lost during period ÷ Costumers at start of a period</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Churn rate</strong> = 1000 and <strong>Customer lifetime</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Churn rate is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Churn rate</strong> = <code>100 × Customers lost during period ÷ Costumers at start of a period</code></li><li><strong>Customers lost during period</strong> = <code>(1 ÷ 100) × Churn rate × Costumers at start of a period</code></li><li><strong>Costumers at start of a period</strong> = <code>100 × Customers lost during period ÷ Churn rate</code></li><li><strong>Customer lifetime</strong> = <code>100 ÷ Churn rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Churn rate</strong> = <code>100 × Customers lost during period ÷ Costumers at start of a period</code> — the form to use when Customers lost during period and Costumers at start of a period are the values you have.</li><li><strong>Customers lost during period</strong> = <code>(1 ÷ 100) × Churn rate × Costumers at start of a period</code> — the form to use when Churn rate and Costumers at start of a period are the values you have.</li><li><strong>Costumers at start of a period</strong> = <code>100 × Customers lost during period ÷ Churn rate</code> — the form to use when Customers lost during period and Churn rate are the values you have.</li><li><strong>Customer lifetime</strong> = <code>100 ÷ Churn rate</code> — the form to use when Churn rate are the values you have.</li><li><strong>Churn rate</strong> = <code>100 ÷ Customer lifetime</code> — the form to use when Customer lifetime are the values you have.</li></ul><p>Any one of Churn rate, Customers lost during period and Costumers at start of a period can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Costumers at start of a period, from 10 to 20 — and the answers go from <strong>Churn rate</strong> 1000 % and <strong>Customer lifetime</strong> 0.1 periods to <strong>Churn rate</strong> 500 % and <strong>Customer lifetime</strong> 0.2 periods.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Churn rate and Customer lifetime are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Costumers at start of a period left as a guess.</strong> Anything typed into Costumers at start of a period is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Customers lost during period left as a guess.</strong> Anything typed into Customers lost during period is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Costumers at start of a period and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Costumers at start of a period</strong> takes a plain number with no unit attached. It feeds Customers lost during period and Churn rate. Have it to hand before you start: Costumers at start of a period is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Customers lost during period</strong> takes a plain number with no unit attached. It feeds Costumers at start of a period and Churn rate. Have it to hand before you start: Customers lost during period is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Churn rate</strong> is a plain number and the page's own defaults put it at 1000. It is worked out from Customers lost during period and Costumers at start of a period. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Customer lifetime</strong> is a plain number and the page's own defaults put it at 0.1. It is worked out from Churn rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Churn rate</th><th>Customer lifetime</th></tr></thead><tbody><tr><td><strong>Costumers at start of a period</strong> +10%</td><td>-9.09%</td><td>+10%</td></tr><tr><td><strong>Customers lost during period</strong> +10%</td><td>+10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Customers lost during period: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Costumers at start of a period = 5 and Customers lost during period = 50, the answer is <strong>Churn rate</strong> = 1000 % and <strong>Customer lifetime</strong> = 0.1 periods.</li><li>With Costumers at start of a period = 30 and Customers lost during period = 100, the answer is <strong>Churn rate</strong> = 333 % and <strong>Customer lifetime</strong> = 0.3 periods.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Costumers at start of a period and Customers lost during period. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Costumers at start of a period into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Churn rate in % with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Churn rate is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Costumers at start of a period and Customers lost during period are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Costumers at start of a period and Customers lost during period measured, Churn rate and Customer lifetime wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/margin-sales-tax">Margin and sales tax Calculator</a>, <a href="/finance/margin-and-vat">Margin and VAT Calculator</a> and <a href="/finance/margin">Margin Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Churn rate calculator work out?', 'a' => <<<'TXT'
            Churn rate and Customer lifetime, from Customers lost during period and Costumers at start of a period. The relationship is Churn rate = 100 × Customers lost during period ÷ Costumers at start of a period.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Costumers at start of a period, Customers lost during period. With costumers at start of a period and customers lost during period in place, Churn rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Churn rate, Customers lost during period, Costumers at start of a period and Customer lifetime blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Churn rate = 1000 % and Customer lifetime = 0.1 periods. The figures come from Costumers at start of a period as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Churn rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Costumers at start of a period left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Churn rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/margin-sales-tax', 'name' => 'Margin and sales tax Calculator'],
            ['path' => '/finance/margin-and-vat', 'name' => 'Margin and VAT Calculator'],
            ['path' => '/finance/margin', 'name' => 'Margin Calculator'],
        ],
        'authors' => [],
    ],
];
