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
    'meta' => ['title' => 'Chi-Square Test for Genetics — Formula & Results', 'description' => 'A chi-square goodness-of-fit test answers one question: are these counts close enough to the ratio I expected? It returns chi-square, degrees of freedom…', 'h1' => 'Chi-Square Test for Genetics', 'updated' => '2026-10-29'],
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
        A chi-square goodness-of-fit test answers one question: are these counts close enough to the ratio I expected? It returns chi-square, degrees of freedom, critical value at 5% and verdict, and the panel shows all of them at once.
        
        This calculator computes the statistic, the degrees of freedom, the critical value at the usual thresholds and the p-value, for any number of classes up to six.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Chi-Square Test for Genetics', 'html' => <<<'TXT'
            <p>χ² = Σ (O − E)² ÷ E, with df = classes − 1</p>
            <figure class="calc-figure"><img src="/uploads/biology/chi-square-genetics-test.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Chi-Square Test for Genetics — The statistic against the 5% and 1% critical values." title="Chi-Square Test for Genetics"><figcaption>The statistic against the 5% and 1% critical values.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>O</code></td><td>observed count</td><td>individuals</td></tr><tr><td><code>E</code></td><td>expected count</td><td>individuals</td></tr><tr><td><code>df</code></td><td>degrees of freedom, classes minus one</td><td>—</td></tr><tr><td><code>χ²</code></td><td>test statistic</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Chi-Square Test for Genetics?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: observed, class 1 of <strong>315</strong>, expected, class 1 of <strong>312.5</strong>, observed, class 2 of <strong>108</strong>, expected, class 2 of <strong>104.2</strong>, observed, class 3 of <strong>101</strong>, expected, class 3 of <strong>104.2</strong>, observed, class 4 of <strong>32</strong>, expected, class 4 of <strong>34.7</strong>.</p>
            <p>Substituting them into the formula gives chi-square of <strong>0.4669</strong>, degrees of freedom of <strong>3</strong>, critical value at 5% of <strong>7.82</strong>, verdict of <strong>1</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>χ² below the critical value</td><td><strong>Do not reject</strong></td><td>the data are consistent with the expected ratio</td></tr><tr><td>above the critical value</td><td><strong>Reject</strong></td><td>the departure is unlikely to be chance</td></tr></tbody></table>
            <ul><li><p>Every expected count should be at least five; if not, combine the smallest classes or use an exact test.</p></li><li><p>The test is one-sided in the sense that only large values are evidence against the model — a χ² near zero can mean the data were fitted rather than observed.</p></li><li><p>Degrees of freedom are classes minus one, minus any parameter estimated from the data.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Subtracting one from the wrong number — a 4-class cross has 3 df, not 4.</li><li>Using percentages as observed counts.</li><li>Re-running the test on subsets until it passes.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What chi-square value is significant?', 'a' => 'Above 3.84 at 1 df, 5.99 at 2 df or 7.81 at 3 df for the conventional 5% threshold.'],
            ['q' => 'Can chi-square prove the expected ratio?', 'a' => 'No. It can only fail to reject it — which is why sample size and power matter.'],
            ['q' => 'What does the Chi-Square Test for Genetics actually calculate?', 'a' => <<<'TXT'
            It returns chi-square, degrees of freedom, critical value at 5% and verdict. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];
