<?php

/**
 * Berger–Parker Index Calculator
 * /biology/berger-parker-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Berger–Parker Index Calculator',
    'meta' => ['title' => 'Berger–Parker Index Calculator — Formula & Results', 'description' => <<<'TXT'
    Berger–Parker Index turns Count of the commonest species and Total individuals into Berger–Parker index d and Reciprocal 1/d. It is a single relationship that…
    TXT, 'h1' => 'Berger–Parker Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dominant',
                            'label' => 'Count of the commonest species',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total individuals',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '400',
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Berger–Parker index d',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'reciprocal',
                            'label' => 'Reciprocal 1/d',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dominance',
                            'label' => 'Dominance',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Dominance',
            'results' => ['index' => 'dominant/total', 'reciprocal' => 'total/dominant', 'dominance' => 'dominant/total*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Berger–Parker Index turns Count of the commonest species and Total individuals into Berger–Parker index d and Reciprocal 1/d. It is a single relationship that reads Berger–Parker index d out of Count of the commonest species, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Berger–Parker Index calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Berger–Parker Index: it takes 2 numbers and reports Berger–Parker index d, Reciprocal 1/d and Dominance.</p><p>The relationship it solves reads Berger–Parker index d = Count of the commonest species ÷ Total individuals.</p><p>The result panel carries Berger–Parker index d, Reciprocal 1/d and Dominance, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Count of the commonest species</strong> — in individuals</li><li><strong>Total individuals</strong> — in individuals</li></ul><p>What you get back is Berger–Parker index d, Reciprocal 1/d, Dominance in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Count of the commonest species = 120 individuals and Total individuals = 400 individuals gives &lt;strong&gt;Berger–Parker index d&lt;/strong&gt; = 0.3, &lt;strong&gt;Reciprocal 1/d&lt;/strong&gt; = 3.33 and &lt;strong&gt;Dominance&lt;/strong&gt; = 30 %.</p><ul><li><strong>Berger–Parker index d</strong> = 0.3</li><li><strong>Reciprocal 1/d</strong> = 3.33</li><li><strong>Dominance</strong> = 30 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Berger–Parker index d</strong> = <code>Count of the commonest species ÷ Total individuals</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Berger–Parker index d&lt;/strong&gt; = 0.3, &lt;strong&gt;Reciprocal 1/d&lt;/strong&gt; = 3.33 and &lt;strong&gt;Dominance&lt;/strong&gt; = 30 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Berger–Parker index d takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Berger–Parker index d</strong> = <code>Count of the commonest species ÷ Total individuals</code></li><li><strong>Reciprocal 1/d</strong> = <code>Total individuals ÷ Count of the commonest species</code></li><li><strong>Dominance</strong> = <code>Count of the commonest species ÷ Total individuals × 100</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Berger–Parker index d, Reciprocal 1/d and Dominance can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Count of the commonest species from 120 to 240, leaving every other box alone. The panel moves from &lt;strong&gt;Berger–Parker index d&lt;/strong&gt; 0.3, &lt;strong&gt;Reciprocal 1/d&lt;/strong&gt; 3.33 and &lt;strong&gt;Dominance&lt;/strong&gt; 30 % to &lt;strong&gt;Berger–Parker index d&lt;/strong&gt; 0.6, &lt;strong&gt;Reciprocal 1/d&lt;/strong&gt; 1.67 and &lt;strong&gt;Dominance&lt;/strong&gt; 60 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Berger–Parker index d, Reciprocal 1/d and Dominance are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Count of the commonest species to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Count of the commonest species and Total individuals measured, Berger–Parker index d and Reciprocal 1/d wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dog-bmi">Dog BMI Calculator</a>, <a href="/biology/dog-calorie">Dog calorie Calculator</a> and <a href="/biology/dog-chocolate-toxicity">Dog chocolate toxicity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Berger–Parker Index calculator work out?', 'a' => <<<'TXT'
            Berger–Parker index d, Reciprocal 1/d and Dominance, from Count of the commonest species and Total individuals. The relationship is Berger–Parker index d = Count of the commonest species ÷ Total individuals.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Count of the commonest species (individuals), Total individuals (individuals). Fill dominant and total and leave Berger–Parker index d empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Berger–Parker index d, Reciprocal 1/d and Dominance can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Berger–Parker index d = 0.3, Reciprocal 1/d = 3.33 and Dominance = 30 %. That comes from the page's own defaults, entered in Count of the commonest species; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Berger–Parker index d is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Count of the commonest species blank and the page solves for it, reporting Berger–Parker index d instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Berger–Parker index d keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-bmi', 'name' => 'Dog BMI Calculator'],
            ['path' => '/biology/dog-calorie', 'name' => 'Dog calorie Calculator'],
            ['path' => '/biology/dog-chocolate-toxicity', 'name' => 'Dog chocolate toxicity Calculator'],
        ],
        'authors' => [],
    ],
];
