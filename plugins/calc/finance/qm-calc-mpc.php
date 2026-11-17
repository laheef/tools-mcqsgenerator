<?php

/**
 * Marginal propensity to consume
 * /finance/mpc
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Marginal propensity to consume',
    'meta' => ['title' => 'Marginal propensity to consume — Formula & Results', 'description' => 'Marginal propensity to consume turns increase in disposable income and increase in consumer spending into consumer spending and MPC. The answer is shown in USD.', 'h1' => 'Marginal propensity to consume Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'disposable_income_change',
                            'label' => 'Increase in disposable income',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '1000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'consumer_spending_change',
                            'label' => 'Increase in consumer spending',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '600',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'Autonomous consumer spending',
                            'type' => 'number',
                            'help' => 'The amount of spending a household would do if it had zero disposable income.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '18000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'yd',
                            'label' => 'Disposable income',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '40000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c',
                            'label' => 'Consumer spending',
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
                            'name' => 'mpc',
                            'label' => 'MPC',
                            'type' => 'number',
                            'help' => 'Marginal propensity to consume.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'mpc = consumer_spending_change / disposable_income_change',
            'results' => ['mpc' => 'consumer_spending_change/disposable_income_change', 'consumer_spending_change' => 'disposable_income_change*mpc', 'disposable_income_change' => 'consumer_spending_change/mpc'],
        ],
        [
            'title' => 'c = a + mpc * yd',
            'results' => ['mpc' => '(-a + c)/yd', 'a' => 'c - mpc*yd', 'yd' => '(-a + c)/mpc', 'c' => 'a + mpc*yd'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Increase in disposable income and Increase in consumer spending into Marginal propensity to consume and the answer comes back as Autonomous consumer spending and Disposable income. It is a single relationship that reads autonomous consumer spending out of increase in disposable income, not a table of canned results keyed by them. Units for Autonomous consumer spending default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Marginal propensity to consume calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Marginal propensity to consume: it takes 2 numbers and reports Autonomous consumer spending, Disposable income and Consumer spending.</p><p>The relationship it solves reads MPC = Increase in consumer spending ÷ Increase in disposable income.</p><p>What comes back is Autonomous consumer spending, Disposable income, Consumer spending and MPC — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Increase in disposable income</strong> — in USD</li><li><strong>Increase in consumer spending</strong> — in USD</li></ul><p>The result boxes are Autonomous consumer spending in USD, Disposable income in USD, Consumer spending in USD, MPC; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Increase in disposable income = 1000 USD, Increase in consumer spending = 600 USD, Autonomous consumer spending = 18000 USD, Disposable income = 40000 USD and Consumer spending = 100 USD; the answers are <strong>MPC</strong> = 0.6.</p><ul><li><strong>MPC</strong> = 0.6</li></ul><p>That is <strong>MPC</strong> = <code>Increase in consumer spending ÷ Increase in disposable income</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>MPC</strong> = 0.6. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Autonomous consumer spending is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>MPC</strong> = <code>Increase in consumer spending ÷ Increase in disposable income</code></li><li><strong>Increase in consumer spending</strong> = <code>Increase in disposable income × MPC</code></li><li><strong>Increase in disposable income</strong> = <code>Increase in consumer spending ÷ MPC</code></li><li><strong>Consumer spending</strong> = <code>Autonomous consumer spending + MPC × Disposable income</code></li><li><strong>Autonomous consumer spending</strong> = <code>Consumer spending − MPC × Disposable income</code></li><li><strong>Disposable income</strong> = <code>( − Autonomous consumer spending + Consumer spending) ÷ MPC</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>MPC</strong> = <code>Increase in consumer spending ÷ Increase in disposable income</code> — the form to use when Increase in consumer spending and Increase in disposable income are the values you have.</li><li><strong>Increase in consumer spending</strong> = <code>Increase in disposable income × MPC</code> — the form to use when Increase in disposable income and MPC are the values you have.</li><li><strong>Increase in disposable income</strong> = <code>Increase in consumer spending ÷ MPC</code> — the form to use when Increase in consumer spending and MPC are the values you have.</li><li><strong>Consumer spending</strong> = <code>Autonomous consumer spending + MPC × Disposable income</code> — the form to use when Autonomous consumer spending, MPC and Disposable income are the values you have.</li><li><strong>MPC</strong> = <code>( − Autonomous consumer spending + Consumer spending) ÷ Disposable income</code> — the form to use when Autonomous consumer spending, Consumer spending and Disposable income are the values you have.</li><li><strong>Autonomous consumer spending</strong> = <code>Consumer spending − MPC × Disposable income</code> — the form to use when Consumer spending, MPC and Disposable income are the values you have.</li><li><strong>Disposable income</strong> = <code>( − Autonomous consumer spending + Consumer spending) ÷ MPC</code> — the form to use when Autonomous consumer spending, Consumer spending and MPC are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of MPC, Increase in consumer spending and Increase in disposable income can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Increase in disposable income from 1000 to 2000, leaving every other box alone. The panel moves from <strong>MPC</strong> 0.6 to <strong>MPC</strong> 0.3.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Autonomous consumer spending, Disposable income and Consumer spending are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Increase in disposable income left as a guess.</strong> Anything typed into Increase in disposable income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Increase in consumer spending left as a guess.</strong> Anything typed into Increase in consumer spending is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Increase in disposable income is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Increase in disposable income</strong> takes a plain number with no unit attached. It feeds MPC and Increase in consumer spending. Have it to hand before you start: Increase in disposable income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Increase in consumer spending</strong> takes a plain number with no unit attached. It feeds MPC and Increase in disposable income. Have it to hand before you start: Increase in consumer spending is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Autonomous consumer spending</strong> is a plain number. It is worked out from Consumer spending, MPC and Disposable income. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Disposable income</strong> is a plain number. It is worked out from Autonomous consumer spending, Consumer spending and MPC. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Consumer spending</strong> is a plain number. It is worked out from Autonomous consumer spending, MPC and Disposable income. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>MPC</strong> is a plain number and the page's own defaults put it at 0.6. It is worked out from Increase in consumer spending and Increase in disposable income. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>MPC</th></tr></thead><tbody><tr><td><strong>Increase in disposable income</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Increase in consumer spending</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Autonomous consumer spending</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Disposable income</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Consumer spending</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Increase in consumer spending: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Autonomous consumer spending, Disposable income and Consumer spending barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Increase in disposable income = 500 USD, Increase in consumer spending = 300 USD, Autonomous consumer spending = 9000 USD, Disposable income = 20000 USD and Consumer spending = 50 USD, the answer is <strong>MPC</strong> = 0.6.</li><li>With Increase in disposable income = 3000 USD, Increase in consumer spending = 600 USD, Autonomous consumer spending = 18000 USD, Disposable income = 40000 USD and Consumer spending = 100 USD, the answer is <strong>MPC</strong> = 0.2.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Autonomous consumer spending is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Increase in disposable income and Increase in consumer spending is what you already know and Autonomous consumer spending and Disposable income is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/fha-loan">FHA loan Calculator</a>, <a href="/finance/fibonacci-retracement">Fibonacci retracement Calculator</a> and <a href="/finance/fica-tax">FICA tax Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Marginal propensity to consume calculator work out?', 'a' => <<<'TXT'
            Autonomous consumer spending, Disposable income, Consumer spending and MPC, from Increase in consumer spending and Increase in disposable income. The relationship is MPC = Increase in consumer spending ÷ Increase in disposable income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Increase in disposable income (USD), Increase in consumer spending (USD). Enter increase in disposable income and increase in consumer spending; Autonomous consumer spending is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. MPC, Increase in consumer spending, Increase in disposable income and Consumer spending can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'MPC = 0.6. That comes from the page\'s own defaults, entered in Increase in disposable income; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Autonomous consumer spending is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Increase in disposable income left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Autonomous consumer spending keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/fha-loan', 'name' => 'FHA loan Calculator'],
            ['path' => '/finance/fibonacci-retracement', 'name' => 'Fibonacci retracement Calculator'],
            ['path' => '/finance/fica-tax', 'name' => 'FICA tax Calculator'],
        ],
        'authors' => [],
    ],
];
