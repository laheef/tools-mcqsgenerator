<?php

/**
 * Heritability Coefficient Calculator
 * /biology/heritability-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Heritability Coefficient Calculator',
    'meta' => ['title' => 'Heritability Coefficient Calculator: Steps & Units', 'description' => 'Heritability Coefficient Calculator works out heritability from parent-offspring regression and heritability from half-sib correlation and reports both.', 'h1' => 'Heritability Coefficient Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'r_parent',
                            'label' => 'Correlation between parent and offspring',
                            'type' => 'number',
                            'help' => '0–1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.35',
                        ],
                        [
                            'name' => 'r_halfsib',
                            'label' => 'Correlation among half sibs',
                            'type' => 'number',
                            'help' => '0–1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.09',
                        ],
                        [
                            'name' => 'additive',
                            'label' => 'Additive genetic variance',
                            'type' => 'number',
                            'help' => 'V_A',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.4',
                        ],
                        [
                            'name' => 'environment',
                            'label' => 'Environmental variance',
                            'type' => 'number',
                            'help' => 'V_E',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.6',
                        ],
                        [
                            'name' => 'selection',
                            'label' => 'Selection differential',
                            'type' => 'number',
                            'suffix' => 'SD',
                            'help' => 'How far the selected parents sit above the mean',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.2',
                        ],
                        [
                            'name' => 'h2_regression',
                            'label' => 'Heritability from parent-offspring regression',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'h2_sib',
                            'label' => 'Heritability from half-sib correlation',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'h2_variance',
                            'label' => 'Heritability from variance components',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'response',
                            'label' => 'Response to selection',
                            'type' => 'number',
                            'suffix' => 'SD',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Heritability',
            'results' => ['h2_regression' => '2*r_parent', 'h2_sib' => '4*r_halfsib', 'h2_variance' => 'additive/(additive+environment)', 'response' => 'additive/(additive+environment)*selection'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Heritability Coefficient turns Correlation between parent and offspring, Correlation among half sibs and Additive genetic variance into Heritability from parent-offspring regression and Heritability from half-sib correlation. It is a single relationship that reads heritability from parent-offspring regression out of correlation between parent and offspring, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Heritability Coefficient calculator works', 'html' => <<<'TXT'
            <p>The Heritability Coefficient calculator applies one relationship to 5 numbers and reports Heritability from parent-offspring regression, Heritability from half-sib correlation and Heritability from variance components.</p><p>Written with the labels from the form, Heritability from parent-offspring regression = 2 × Correlation between parent and offspring.</p><p>The result panel carries Heritability from parent-offspring regression, Heritability from half-sib correlation, Heritability from variance components and Response to selection, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Correlation between parent and offspring</strong> — a plain number, no unit. 0–1</li><li><strong>Correlation among half sibs</strong> — a plain number, no unit. 0–1</li><li><strong>Additive genetic variance</strong> — a plain number, no unit. V_A</li><li><strong>Environmental variance</strong> — a plain number, no unit. V_E</li><li><strong>Selection differential</strong> — in SD. How far the selected parents sit above the mean</li></ul><p>What you get back is Heritability from parent-offspring regression, Heritability from half-sib correlation, Heritability from variance components, Response to selection in SD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Correlation between parent and offspring = 0.35, Correlation among half sibs = 0.09, Additive genetic variance = 0.4, Environmental variance = 0.6 and Selection differential = 1.2 SD; the answers are <strong>Heritability from parent-offspring regression</strong> = 0.7, <strong>Heritability from half-sib correlation</strong> = 0.36, <strong>Heritability from variance components</strong> = 0.4 and <strong>Response to selection</strong> = 0.48 SD.</p><ul><li><strong>Heritability from parent-offspring regression</strong> = 0.7</li><li><strong>Heritability from half-sib correlation</strong> = 0.36</li><li><strong>Heritability from variance components</strong> = 0.4</li><li><strong>Response to selection</strong> = 0.48 SD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Heritability from parent-offspring regression</strong> = <code>2 × Correlation between parent and offspring</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Heritability from parent-offspring regression</strong> = 0.7, <strong>Heritability from half-sib correlation</strong> = 0.36, <strong>Heritability from variance components</strong> = 0.4 and <strong>Response to selection</strong> = 0.48 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Heritability from parent-offspring regression takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Heritability from parent-offspring regression</strong> = <code>2 × Correlation between parent and offspring</code></li><li><strong>Heritability from half-sib correlation</strong> = <code>4 × Correlation among half sibs</code></li><li><strong>Heritability from variance components</strong> = <code>Additive genetic variance ÷ (Additive genetic variance + Environmental variance)</code></li><li><strong>Response to selection</strong> = <code>Additive genetic variance ÷ (Additive genetic variance + Environmental variance) × Selection differential</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Heritability from parent-offspring regression</strong> = <code>2 × Correlation between parent and offspring</code> — the form to use when Correlation between parent and offspring are the values you have.</li><li><strong>Heritability from half-sib correlation</strong> = <code>4 × Correlation among half sibs</code> — the form to use when Correlation among half sibs are the values you have.</li><li><strong>Heritability from variance components</strong> = <code>Additive genetic variance ÷ (Additive genetic variance + Environmental variance)</code> — the form to use when Additive genetic variance and Environmental variance are the values you have.</li><li><strong>Response to selection</strong> = <code>Additive genetic variance ÷ (Additive genetic variance + Environmental variance) × Selection differential</code> — the form to use when Additive genetic variance, Environmental variance and Selection differential are the values you have.</li></ul><p>Any one of Heritability from parent-offspring regression, Heritability from half-sib correlation and Heritability from variance components can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Correlation between parent and offspring from 0.35 to 0.7, leaving every other box alone. The panel moves from <strong>Heritability from parent-offspring regression</strong> 0.7, <strong>Heritability from half-sib correlation</strong> 0.36, <strong>Heritability from variance components</strong> 0.4 and <strong>Response to selection</strong> 0.48 SD to <strong>Heritability from parent-offspring regression</strong> 1.4, <strong>Heritability from half-sib correlation</strong> 0.36, <strong>Heritability from variance components</strong> 0.4 and <strong>Response to selection</strong> 0.48 SD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Correlation between parent and offspring left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Correlation between parent and offspring is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Correlation among half sibs left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Correlation among half sibs is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Additive genetic variance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Additive genetic variance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Correlation between parent and offspring is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Correlation between parent and offspring</strong> takes a plain number with no unit attached. It feeds Heritability from parent-offspring regression. Have it to hand before you start: Correlation between parent and offspring is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Correlation among half sibs</strong> takes a plain number with no unit attached. It feeds Heritability from half-sib correlation. Have it to hand before you start: Correlation among half sibs is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Additive genetic variance</strong> takes a plain number with no unit attached. It feeds Heritability from variance components and Response to selection. Have it to hand before you start: Additive genetic variance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Environmental variance</strong> takes a plain number with no unit attached. It feeds Heritability from variance components and Response to selection. Have it to hand before you start: Environmental variance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Selection differential</strong> is measured in SD. How far the selected parents sit above the mean. It feeds Response to selection. Have it to hand before you start: Selection differential is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Heritability from parent-offspring regression</strong> is a plain number and the page's own defaults put it at 0.7. It is worked out from Correlation between parent and offspring. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Heritability from half-sib correlation</strong> is a plain number and the page's own defaults put it at 0.36. It is worked out from Correlation among half sibs. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Heritability from variance components</strong> is a plain number and the page's own defaults put it at 0.4. It is worked out from Additive genetic variance and Environmental variance. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Response to selection</strong> is a plain number and the page's own defaults put it at 0.48. It is worked out from Additive genetic variance, Environmental variance and Selection differential. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Heritability from parent-offspring regression</th><th>Heritability from half-sib correlation</th><th>Heritability from variance components</th><th>Response to selection</th></tr></thead><tbody><tr><td><strong>Correlation between parent and offspring</strong> +10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Correlation among half sibs</strong> +10%</td><td>+0%</td><td>+10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Additive genetic variance</strong> +10%</td><td>+0%</td><td>+0%</td><td>+5.77%</td><td>+5.77%</td></tr><tr><td><strong>Environmental variance</strong> +10%</td><td>+0%</td><td>+0%</td><td>-5.66%</td><td>-5.66%</td></tr><tr><td><strong>Selection differential</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Correlation between parent and offspring sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Correlation between parent and offspring = 0.175, Correlation among half sibs = 0.045, Additive genetic variance = 0.2, Environmental variance = 0.3 and Selection differential = 0.6 SD, the answer is <strong>Heritability from parent-offspring regression</strong> = 0.35, <strong>Heritability from half-sib correlation</strong> = 0.18, <strong>Heritability from variance components</strong> = 0.4 and <strong>Response to selection</strong> = 0.24 SD.</li><li>With Correlation between parent and offspring = 1.05, Correlation among half sibs = 0.09, Additive genetic variance = 0.4, Environmental variance = 0.6 and Selection differential = 1.2 SD, the answer is <strong>Heritability from parent-offspring regression</strong> = 2.1, <strong>Heritability from half-sib correlation</strong> = 0.36, <strong>Heritability from variance components</strong> = 0.4 and <strong>Response to selection</strong> = 0.48 SD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Heritability from parent-offspring regression follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Correlation between parent and offspring, Correlation among half sibs and Additive genetic variance and the number you are missing is Heritability from parent-offspring regression and Heritability from half-sib correlation.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dilution-calculator-c1v1">Dilution (C1V1 = C2V2) Calculator</a>, <a href="/biology/dna-concentration">DNA concentration</a> and <a href="/biology/dna-copy-number">DNA copy number Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Heritability Coefficient calculator work out?', 'a' => <<<'TXT'
            Heritability from parent-offspring regression, Heritability from half-sib correlation, Heritability from variance components and Response to selection, from Correlation between parent and offspring. The relationship is Heritability from parent-offspring regression = 2 × Correlation between parent and offspring.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Correlation between parent and offspring, Correlation among half sibs, Additive genetic variance, Environmental variance, Selection differential (SD). Fill correlation between parent and offspring, correlation among half sibs and additive genetic variance and leave Heritability from parent-offspring regression empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Heritability from parent-offspring regression, Heritability from half-sib correlation, Heritability from variance components and Response to selection blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Heritability from parent-offspring regression = 0.7, Heritability from half-sib correlation = 0.36, Heritability from variance components = 0.4 and Response to selection = 0.48 SD. The figures come from Correlation between parent and offspring as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Heritability from parent-offspring regression is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Correlation between parent and offspring left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Heritability from parent-offspring regression keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dilution-calculator-c1v1', 'name' => 'Dilution (C1V1 = C2V2) Calculator'],
            ['path' => '/biology/dna-concentration', 'name' => 'DNA concentration'],
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number Calculator'],
        ],
        'authors' => [],
    ],
];
