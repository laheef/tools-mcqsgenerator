<?php

/**
 * Marginal cost
 * /finance/marginal-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Marginal cost',
    'meta' => ['title' => 'Marginal cost Calculator — Formula & Results', 'description' => 'Enter change in total cost and change in quantity and get marginal cost back. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Marginal cost Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_cost_change',
                            'label' => 'Change in total cost',
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
                            'name' => 'quantity_change',
                            'label' => 'Change in quantity',
                            'type' => 'number',
                            'unit' => '97',
                            'unit_default' => 'unit',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'marginal_cost',
                            'label' => 'Marginal cost',
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
            'title' => 'marginal_cost = total_cost_change / quantity_change',
            'results' => ['total_cost_change' => 'marginal_cost*quantity_change', 'quantity_change' => 'total_cost_change/marginal_cost', 'marginal_cost' => 'total_cost_change/quantity_change'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Change in total cost and Change in quantity into Marginal cost and the answer comes back as Marginal cost. Nothing is looked up on this page: marginal cost is computed from change in total cost and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Marginal cost is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Marginal cost calculator works', 'html' => <<<'TXT'
            <p>The Marginal cost calculator applies one relationship to 2 numbers and reports Marginal cost.</p><p>Written with the labels from the form, Marginal cost = Change in total cost ÷ Change in quantity.</p><p>The result panel carries Marginal cost, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Change in total cost</strong> — in USD</li><li><strong>Change in quantity</strong> — in units/points (1)</li></ul><p>The answer comes back as Marginal cost in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Change in total cost = 10 USD and Change in quantity = 100 unit — through the same formula and the panel reports <strong>Marginal cost</strong> = 0.1 USD.</p><ul><li><strong>Marginal cost</strong> = 0.1 USD</li></ul><p>The line behind those figures is <strong>Marginal cost</strong> = <code>Change in total cost ÷ Change in quantity</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Marginal cost</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Change in quantity lists 9 options and opens on units/points (1). Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Marginal cost</strong> = <code>Change in total cost ÷ Change in quantity</code></li><li><strong>Change in total cost</strong> = <code>Marginal cost × Change in quantity</code></li><li><strong>Change in quantity</strong> = <code>Change in total cost ÷ Marginal cost</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Marginal cost</strong> = <code>Change in total cost ÷ Change in quantity</code> — the form to use when Change in total cost and Change in quantity are the values you have.</li><li><strong>Change in total cost</strong> = <code>Marginal cost × Change in quantity</code> — the form to use when Marginal cost and Change in quantity are the values you have.</li><li><strong>Change in quantity</strong> = <code>Change in total cost ÷ Marginal cost</code> — the form to use when Change in total cost and Marginal cost are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Marginal cost, Change in total cost and Change in quantity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Change in total cost, from 10 to 20 — and the answers go from <strong>Marginal cost</strong> 0.1 USD to <strong>Marginal cost</strong> 0.2 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Change in quantity carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Marginal cost is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Change in total cost left as a guess.</strong> Anything typed into Change in total cost is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Change in quantity left as a guess.</strong> Anything typed into Change in quantity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Change in total cost is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Change in total cost</strong> takes a plain number with no unit attached. Change it and Change in quantity and Marginal cost changes with it. Have it to hand before you start: Change in total cost is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Change in quantity</strong> is a units/points (1) quantity: the page opens it in unit and converts anything else you pick before the formula runs. Change it and Change in total cost and Marginal cost changes with it. Have it to hand before you start: Change in quantity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Marginal cost</strong> is a plain number and the page's own defaults put it at 0.1. It is worked out from Change in total cost and Change in quantity. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Marginal cost</th></tr></thead><tbody><tr><td><strong>Change in total cost</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Change in quantity</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Change in total cost: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Change in total cost = 5 USD and Change in quantity = 50 unit, the answer is <strong>Marginal cost</strong> = 0.1 USD.</li><li>With Change in total cost = 30 USD and Change in quantity = 100 unit, the answer is <strong>Marginal cost</strong> = 0.3 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>units/points (1)</strong> — opens in <em>unit</em>, and the chip also carries pairs, decades, half-dozens, dozens, baker&#039;s dozens and scores. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Change in total cost and Change in quantity. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Change in total cost into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Marginal cost in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Marginal cost is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover units/points (1). A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Change in total cost and Change in quantity and the number you are missing is Marginal cost.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/money-counter">Money counter Calculator</a>, <a href="/finance/money-factor">Money factor</a> and <a href="/finance/money-market-account">Money market account Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Marginal cost calculator work out?', 'a' => 'Marginal cost, from Change in total cost and Change in quantity. The relationship is Marginal cost = Change in total cost ÷ Change in quantity.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Change in total cost (USD), Change in quantity (units/points (1)). Fill change in total cost and change in quantity and leave Marginal cost empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Marginal cost, Change in total cost and Change in quantity can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Marginal cost = 0.1 USD. The figures come from Change in total cost as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Marginal cost is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Change in total cost left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Marginal cost at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/money-counter', 'name' => 'Money counter Calculator'],
            ['path' => '/finance/money-factor', 'name' => 'Money factor'],
            ['path' => '/finance/money-market-account', 'name' => 'Money market account Calculator'],
        ],
        'authors' => [],
    ],
];
