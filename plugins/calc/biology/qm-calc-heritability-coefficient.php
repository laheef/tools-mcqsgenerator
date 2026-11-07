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
    'meta' => ['title' => 'Heritability Coefficient Calculator — Biology', 'description' => 'Heritability Coefficient turns Correlation between parent and offspring, Correlation among half sibs and Additive genetic variance into Heritability from…', 'h1' => 'Heritability Coefficient Calculator', 'updated' => '2026-10-29'],
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
        Heritability Coefficient turns Correlation between parent and offspring, Correlation among half sibs and Additive genetic variance into Heritability from parent-offspring regression and Heritability from half-sib correlation. It is a single relationship that reads Heritability from parent-offspring regression out of Correlation between parent and offspring, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Heritability Coefficient calculator works', 'html' => <<<'TXT'
            <p>The Heritability Coefficient calculator applies one relationship to 5 numbers and reports Heritability from parent-offspring regression, Heritability from half-sib correlation and Heritability from variance components.</p><p>Written with the labels from the form, Heritability from parent-offspring regression = 2 × Correlation between parent and offspring.</p><p>The result panel carries Heritability from parent-offspring regression, Heritability from half-sib correlation, Heritability from variance components and Response to selection, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Correlation between parent and offspring</strong> — a plain number, no unit. 0–1</li><li><strong>Correlation among half sibs</strong> — a plain number, no unit. 0–1</li><li><strong>Additive genetic variance</strong> — a plain number, no unit. V_A</li><li><strong>Environmental variance</strong> — a plain number, no unit. V_E</li><li><strong>Selection differential</strong> — in SD. How far the selected parents sit above the mean</li></ul><p>What you get back is Heritability from parent-offspring regression, Heritability from half-sib correlation, Heritability from variance components, Response to selection in SD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Correlation between parent and offspring = 0.35, Correlation among half sibs = 0.09, Additive genetic variance = 0.4, Environmental variance = 0.6 and Selection differential = 1.2 SD; the answers are &lt;strong&gt;Heritability from parent-offspring regression&lt;/strong&gt; = 0.7, &lt;strong&gt;Heritability from half-sib correlation&lt;/strong&gt; = 0.36, &lt;strong&gt;Heritability from variance components&lt;/strong&gt; = 0.4 and &lt;strong&gt;Response to selection&lt;/strong&gt; = 0.48 SD.</p><ul><li><strong>Heritability from parent-offspring regression</strong> = 0.7</li><li><strong>Heritability from half-sib correlation</strong> = 0.36</li><li><strong>Heritability from variance components</strong> = 0.4</li><li><strong>Response to selection</strong> = 0.48 SD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Heritability from parent-offspring regression</strong> = <code>2 × Correlation between parent and offspring</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Heritability from parent-offspring regression&lt;/strong&gt; = 0.7, &lt;strong&gt;Heritability from half-sib correlation&lt;/strong&gt; = 0.36, &lt;strong&gt;Heritability from variance components&lt;/strong&gt; = 0.4 and &lt;strong&gt;Response to selection&lt;/strong&gt; = 0.48 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Heritability from parent-offspring regression takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Heritability from parent-offspring regression</strong> = <code>2 × Correlation between parent and offspring</code></li><li><strong>Heritability from half-sib correlation</strong> = <code>4 × Correlation among half sibs</code></li><li><strong>Heritability from variance components</strong> = <code>Additive genetic variance ÷ (Additive genetic variance + Environmental variance)</code></li><li><strong>Response to selection</strong> = <code>Additive genetic variance ÷ (Additive genetic variance + Environmental variance) × Selection differential</code></li></ul><p>Any one of Heritability from parent-offspring regression, Heritability from half-sib correlation and Heritability from variance components can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Correlation between parent and offspring from 0.35 to 0.7, leaving every other box alone. The panel moves from &lt;strong&gt;Heritability from parent-offspring regression&lt;/strong&gt; 0.7, &lt;strong&gt;Heritability from half-sib correlation&lt;/strong&gt; 0.36, &lt;strong&gt;Heritability from variance components&lt;/strong&gt; 0.4 and &lt;strong&gt;Response to selection&lt;/strong&gt; 0.48 SD to &lt;strong&gt;Heritability from parent-offspring regression&lt;/strong&gt; 1.4, &lt;strong&gt;Heritability from half-sib correlation&lt;/strong&gt; 0.36, &lt;strong&gt;Heritability from variance components&lt;/strong&gt; 0.4 and &lt;strong&gt;Response to selection&lt;/strong&gt; 0.48 SD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Heritability from parent-offspring regression, Heritability from half-sib correlation and Heritability from variance components are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Correlation between parent and offspring is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
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
            Correlation between parent and offspring, Correlation among half sibs, Additive genetic variance, Environmental variance, Selection differential (SD). Fill r_parent, r_halfsib and additive and leave Heritability from parent-offspring regression empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Heritability from parent-offspring regression, Heritability from half-sib correlation, Heritability from variance components and Response to selection blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Heritability from parent-offspring regression = 0.7, Heritability from half-sib correlation = 0.36, Heritability from variance components = 0.4 and Response to selection = 0.48 SD. The figures come from Correlation between parent and offspring as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Heritability from parent-offspring regression is not rounded at all; the figure you read is formatted for legibility.'],
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
