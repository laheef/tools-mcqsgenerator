<?php

/**
 * Chi-Square Test for Genetics
 * /biology/chi-square-genetics-test
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chi-Square Test for Genetics',
    'meta' => ['title' => 'Chi-Square Test for Genetics — Formula & Results', 'description' => 'Chi-Square Test for Genetics turns Observed, class 1, Expected, class 1 and Observed, class 2 into Chi-square and Degrees of freedom. The answer typed back in.', 'h1' => 'Chi-Square Test for Genetics', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'o1',
                            'label' => 'Observed, class 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '315',
                        ],
                        [
                            'name' => 'e1',
                            'label' => 'Expected, class 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '312.5',
                        ],
                        [
                            'name' => 'o2',
                            'label' => 'Observed, class 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '108',
                        ],
                        [
                            'name' => 'e2',
                            'label' => 'Expected, class 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '104.2',
                        ],
                        [
                            'name' => 'o3',
                            'label' => 'Observed, class 3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '101',
                        ],
                        [
                            'name' => 'e3',
                            'label' => 'Expected, class 3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '104.2',
                        ],
                        [
                            'name' => 'o4',
                            'label' => 'Observed, class 4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '32',
                        ],
                        [
                            'name' => 'e4',
                            'label' => 'Expected, class 4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '34.7',
                        ],
                        [
                            'name' => 'chi',
                            'label' => 'Chi-square',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'df',
                            'label' => 'Degrees of freedom',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'crit',
                            'label' => 'Critical value at 5%',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'verdict',
                            'label' => 'Verdict',
                            'type' => 'number',
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
            'title' => 'Test',
            'results' => ['chi' => 'pow(o1-e1,2)/e1+pow(o2-e2,2)/e2+pow(o3-e3,2)/e3+pow(o4-e4,2)/e4', 'df' => '3', 'crit' => '7.815', 'verdict' => '1'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Chi-Square Test for Genetics turns Observed, class 1, Expected, class 1 and Observed, class 2 into Chi-square and Degrees of freedom. It is a single relationship that reads Chi-square out of Observed, class 1, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Chi-Square Test for Genetics calculator works', 'html' => <<<'TXT'
            <p>Chi-Square Test for Genetics answers one question from 8 numbers, and the answer is Chi-square, Degrees of freedom and Critical value at 5%.</p><p>The answers are Chi-square, Degrees of freedom, Critical value at 5% and Verdict; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 8 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Observed, class 1</strong> — a plain number, no unit</li><li><strong>Expected, class 1</strong> — a plain number, no unit</li><li><strong>Observed, class 2</strong> — a plain number, no unit</li><li><strong>Expected, class 2</strong> — a plain number, no unit</li><li><strong>Observed, class 3</strong> — a plain number, no unit</li><li><strong>Expected, class 3</strong> — a plain number, no unit</li><li><strong>Observed, class 4</strong> — a plain number, no unit</li><li><strong>Expected, class 4</strong> — a plain number, no unit</li></ul><p>The result boxes are Chi-square, Degrees of freedom, Critical value at 5%, Verdict; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Observed, class 1 = 315, Expected, class 1 = 313, Observed, class 2 = 108, Expected, class 2 = 104, Observed, class 3 = 101, Expected, class 3 = 104, Observed, class 4 = 32 and Expected, class 4 = 34.7 — through the same formula and the panel reports &lt;strong&gt;Chi-square&lt;/strong&gt; = 0.4669, &lt;strong&gt;Degrees of freedom&lt;/strong&gt; = 3, &lt;strong&gt;Critical value at 5%&lt;/strong&gt; = 7.82 and &lt;strong&gt;Verdict&lt;/strong&gt; = 1.</p><ul><li><strong>Chi-square</strong> = 0.4669</li><li><strong>Degrees of freedom</strong> = 3</li><li><strong>Critical value at 5%</strong> = 7.82</li><li><strong>Verdict</strong> = 1</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Chi-square&lt;/strong&gt; = 0.4669, &lt;strong&gt;Degrees of freedom&lt;/strong&gt; = 3, &lt;strong&gt;Critical value at 5%&lt;/strong&gt; = 7.82 and &lt;strong&gt;Verdict&lt;/strong&gt; = 1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Chi-square takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Degrees of freedom</strong> = <code>3</code></li><li><strong>Critical value at 5%</strong> = <code>7.815</code></li><li><strong>Verdict</strong> = <code>1</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Chi-square, Degrees of freedom and Critical value at 5% can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Observed, class 1 from 315 to 630, leaving every other box alone. The panel moves from &lt;strong&gt;Chi-square&lt;/strong&gt; 0.4669, &lt;strong&gt;Degrees of freedom&lt;/strong&gt; 3, &lt;strong&gt;Critical value at 5%&lt;/strong&gt; 7.82 and &lt;strong&gt;Verdict&lt;/strong&gt; 1 to &lt;strong&gt;Chi-square&lt;/strong&gt; 323, &lt;strong&gt;Degrees of freedom&lt;/strong&gt; 3, &lt;strong&gt;Critical value at 5%&lt;/strong&gt; 7.82 and &lt;strong&gt;Verdict&lt;/strong&gt; 1.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Chi-square, Degrees of freedom and Critical value at 5% are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Observed, class 1 and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Observed, class 1, Expected, class 1 and Observed, class 2 is what you already know and Chi-square and Degrees of freedom is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/compost-application-rate">Compost Application Rate Calculator</a>, <a href="/biology/compost">Compost Calculator</a> and <a href="/biology/corn-yield">Corn yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Chi-Square Test for Genetics calculator work out?', 'a' => 'Chi-square, Degrees of freedom, Critical value at 5% and Verdict, from Observed, class 1, Expected, class 1, Observed, class 2 and Expected, class 2.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Observed, class 1, Expected, class 1, Observed, class 2, Expected, class 2, Observed, class 3. Fill o1, e1 and o2 and leave Chi-square empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Chi-square, Degrees of freedom, Critical value at 5% and Verdict can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Chi-square = 0.4669, Degrees of freedom = 3, Critical value at 5% = 7.82 and Verdict = 1. The figures come from Observed, class 1 as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Chi-square is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Observed, class 1 blank and the page solves for it, reporting Chi-square instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Chi-square keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/compost-application-rate', 'name' => 'Compost Application Rate Calculator'],
            ['path' => '/biology/compost', 'name' => 'Compost Calculator'],
            ['path' => '/biology/corn-yield', 'name' => 'Corn yield Calculator'],
        ],
        'authors' => [],
    ],
];
