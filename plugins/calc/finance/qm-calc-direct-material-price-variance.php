<?php

/**
 * Direct material price variance
 * /finance/direct-material-price-variance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Direct material price variance',
    'meta' => ['title' => 'Direct material price variance — Formula & Results', 'description' => 'Direct material price variance takes standard rate and returns direct materials price variance. Every box can be solved for, not only the one in the title.', 'h1' => 'Direct material price variance Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'standard_rate',
                            'label' => 'Standard rate',
                            'type' => 'number',
                            'help' => 'Anticipated cost per unit based on budget or historical data.',
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
                            'name' => 'actual_rate',
                            'label' => 'Actual rate',
                            'type' => 'number',
                            'help' => 'Price actually paid for the materials.',
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
                            'name' => 'quantity',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'direct_materials_price_variance',
                            'label' => 'Direct materials price variance',
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
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'direct_materials_price_variance > 0', 'text' => <<<'TXT'
                                As the direct materials price variance is positive, the direct materials price variance is unfavorable. This means that you are purchasing materials above their actual price.&nbsp;
                                TXT],
                                ['when' => 'direct_materials_price_variance < 0', 'text' => <<<'TXT'
                                As the direct materials price variance is negative, the direct materials price variance is favorable. This means that you are purchasing materials below their actual rate.&nbsp;
                                TXT],
                                ['when' => 'direct_materials_price_variance == 0', 'text' => 'The direct materials price variance is zero. This means that you are purchasing materials at their actual rate.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'direct_materials_price_variance = (quantity * actual_rate) - (quantity * standard_rate)',
            'results' => ['direct_materials_price_variance' => 'quantity*(actual_rate - standard_rate)', 'actual_rate' => 'direct_materials_price_variance/quantity + standard_rate', 'quantity' => 'direct_materials_price_variance/(actual_rate - standard_rate)', 'standard_rate' => 'actual_rate - direct_materials_price_variance/quantity'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Direct material price variance works out Direct materials price variance from Standard rate, Actual rate and Quantity. The arithmetic is the whole method: direct materials price variance is worked out from standard rate by one formula, applied once. Direct materials price variance comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Direct material price variance calculator works', 'html' => <<<'TXT'
            <p>Direct material price variance answers one question from 3 numbers, and the answer is Direct materials price variance.</p><p>The relationship it solves reads Direct materials price variance = Quantity × (Actual rate − Standard rate).</p><p>What comes back is Direct materials price variance — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Standard rate</strong> — in USD. Anticipated cost per unit based on budget or historical data.</li><li><strong>Actual rate</strong> — in USD. Price actually paid for the materials.</li><li><strong>Quantity</strong> — a plain number, no unit</li></ul><p>The result box is Direct materials price variance in USD. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Standard rate = 10 USD, Actual rate = 100 USD and Quantity = 1000; the answers are <strong>Direct materials price variance</strong> = 90000 USD.</p><ul><li><strong>Direct materials price variance</strong> = 90000 USD</li></ul><p>The line behind those figures is <strong>Direct materials price variance</strong> = <code>Quantity × (Actual rate − Standard rate)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Direct materials price variance</strong> = 90000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Direct materials price variance is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Direct materials price variance</strong> = <code>Quantity × (Actual rate − Standard rate)</code></li><li><strong>Actual rate</strong> = <code>Direct materials price variance ÷ Quantity + Standard rate</code></li><li><strong>Quantity</strong> = <code>Direct materials price variance ÷ (Actual rate − Standard rate)</code></li><li><strong>Standard rate</strong> = <code>Actual rate − Direct materials price variance ÷ Quantity</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Direct materials price variance</strong> = <code>Quantity × (Actual rate − Standard rate)</code> — the form to use when Quantity, Actual rate and Standard rate are the values you have.</li><li><strong>Actual rate</strong> = <code>Direct materials price variance ÷ Quantity + Standard rate</code> — the form to use when Direct materials price variance, Quantity and Standard rate are the values you have.</li><li><strong>Quantity</strong> = <code>Direct materials price variance ÷ (Actual rate − Standard rate)</code> — the form to use when Direct materials price variance, Actual rate and Standard rate are the values you have.</li><li><strong>Standard rate</strong> = <code>Actual rate − Direct materials price variance ÷ Quantity</code> — the form to use when Actual rate, Direct materials price variance and Quantity are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Direct materials price variance, Actual rate and Quantity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Standard rate, from 10 to 20 — and the answers go from <strong>Direct materials price variance</strong> 90000 USD to <strong>Direct materials price variance</strong> 80000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Direct materials price variance is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Standard rate left as a guess.</strong> Anything typed into Standard rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Actual rate left as a guess.</strong> Anything typed into Actual rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Quantity left as a guess.</strong> Anything typed into Quantity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Standard rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Standard rate</strong> takes a plain number with no unit attached. Anticipated cost per unit based on budget or historical data. It feeds Direct materials price variance, Actual rate and Quantity. Have it to hand before you start: Standard rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Actual rate</strong> takes a plain number with no unit attached. Price actually paid for the materials. It feeds Direct materials price variance, Quantity and Standard rate. Have it to hand before you start: Actual rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Quantity</strong> takes a plain number with no unit attached. It feeds Direct materials price variance, Actual rate and Standard rate. Have it to hand before you start: Quantity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Direct materials price variance</strong> is a plain number and the page's own defaults put it at 90000. It is worked out from Quantity, Actual rate and Standard rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Direct materials price variance</th></tr></thead><tbody><tr><td><strong>Standard rate</strong> +10%</td><td>-1.11%</td></tr><tr><td><strong>Actual rate</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Quantity</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Actual rate: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Standard rate = 5 USD, Actual rate = 50 USD and Quantity = 500, the answer is <strong>Direct materials price variance</strong> = 22500 USD.</li><li>With Standard rate = 30 USD, Actual rate = 100 USD and Quantity = 1000, the answer is <strong>Direct materials price variance</strong> = 70000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Standard rate, Actual rate and Quantity. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Standard rate into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Direct materials price variance in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Direct materials price variance is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Standard rate, Actual rate and Quantity measured, Direct materials price variance wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/contribution-margin">Contribution margin</a>, <a href="/finance/online-marketing-roi">Conversion rate Calculator</a> and <a href="/finance/cost-function">Cost function</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Direct material price variance calculator work out?', 'a' => <<<'TXT'
            Direct materials price variance, from Quantity, Actual rate and Standard rate. The relationship is Direct materials price variance = Quantity × (Actual rate − Standard rate).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Standard rate (USD), Actual rate (USD), Quantity. With standard rate, actual rate and quantity in place, Direct materials price variance can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Direct materials price variance, Actual rate, Quantity and Standard rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Direct materials price variance = 90000 USD. The figures come from Standard rate as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Direct materials price variance is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Standard rate left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Direct materials price variance keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/contribution-margin', 'name' => 'Contribution margin'],
            ['path' => '/finance/online-marketing-roi', 'name' => 'Conversion rate Calculator'],
            ['path' => '/finance/cost-function', 'name' => 'Cost function'],
        ],
        'authors' => [],
    ],
];
