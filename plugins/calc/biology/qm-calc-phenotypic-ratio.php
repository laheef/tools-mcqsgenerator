<?php

/**
 * Phenotypic Ratio Calculator
 * /biology/phenotypic-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Phenotypic Ratio Calculator',
    'meta' => ['title' => 'Phenotypic Ratio Calculator — Formula & Results', 'description' => 'Phenotypic ratios are what you count on a bench, but the numbers that matter are the proportions they imply. It returns total scored, ratio to the smallest…', 'h1' => 'Phenotypic Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'Class 1 count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '180',
                        ],
                        [
                            'name' => 'b',
                            'label' => 'Class 2 count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '62',
                        ],
                        [
                            'name' => 'c',
                            'label' => 'Class 3 count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '58',
                        ],
                        [
                            'name' => 'd',
                            'label' => 'Class 4 count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total scored',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Ratio to the smallest class',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pct1',
                            'label' => 'Class 1 share',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'chi',
                            'label' => 'Chi-square vs 9:3:3:1',
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
            'title' => 'Ratio',
            'results' => ['total' => 'a+b+c+d', 'ratio' => '(a+b+c+d)/min(min(a,b),min(c,d))', 'pct1' => 'a/(a+b+c+d)*100', 'chi' => 'pow(a-(a+b+c+d)*9/16,2)/((a+b+c+d)*9/16)+pow(b-(a+b+c+d)*3/16,2)/((a+b+c+d)*3/16)+pow(c-(a+b+c+d)*3/16,2)/((a+b+c+d)*3/16)+pow(d-(a+b+c+d)/16,2)/((a+b+c+d)/16)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Phenotypic ratios are what you count on a bench, but the numbers that matter are the proportions they imply. It returns total scored, ratio to the smallest class, class 1 share and chi-square vs 9:3:3:1, and the panel shows all of them at once.
        
        This calculator turns raw counts into a ratio in lowest whole numbers, the percentage of each class and the chi-square test against an expected Mendelian ratio.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Phenotypic Ratio', 'html' => <<<'TXT'
            <p>Ratio = each class ÷ the smallest class; χ² = Σ (O − E)² ÷ E</p>
            <figure class="calc-figure"><img src="/uploads/biology/phenotypic-ratio.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Phenotypic Ratio Calculator — Observed classes against the expected ratio." title="Phenotypic Ratio Calculator"><figcaption>Observed classes against the expected ratio.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>O</code></td><td>observed count in a class</td><td>individuals</td></tr><tr><td><code>E</code></td><td>expected count from the ratio</td><td>individuals</td></tr><tr><td><code>χ²</code></td><td>test statistic, 3 degrees of freedom for four classes</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Phenotypic Ratio?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: class 1 count of <strong>180</strong>, class 2 count of <strong>62</strong>, class 3 count of <strong>58</strong>, class 4 count of <strong>20</strong>.</p>
            <p>Substituting them into the formula gives total scored of <strong>320</strong>, ratio to the smallest class of <strong>16</strong>, class 1 share of <strong>56.25</strong>%, chi-square vs 9:3:3:1 of <strong>0.1333</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>χ² below 7.81</td><td><strong>Fits 9:3:3:1</strong></td><td>the 5% critical value at 3 df</td></tr><tr><td>7.81 – 11.34</td><td><strong>Marginal</strong></td><td>between the 5% and 1% critical values</td></tr><tr><td>above 11.34</td><td><strong>Does not fit</strong></td><td>linkage, lethality or scoring error</td></tr></tbody></table>
            <ul><li><p>Ratios are only comparable when every class has the same expected weight; a cross with lethal genotypes will not give whole-number Mendelian ratios.</p></li><li><p>Chi-square assumes independent observations. Counts from the same plant or the same family are not independent, which inflates the statistic.</p></li><li><p>The 5% critical values are 3.84 (1 df), 5.99 (2 df) and 7.81 (3 df).</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Dividing by the largest class instead of the smallest, which gives ratios below 1.</li><li>Comparing a chi-square to a critical value with the wrong number of degrees of freedom.</li><li>Reporting a ratio from fewer than about 100 individuals.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/dihybrid-cross">Dihybrid cross</a>. <a href="/biology/chi-square-genetics-test">Chi-square test for genetics</a>. <a href="/biology/recombination-frequency">Recombination frequency</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I get a ratio like 9:3:3:1 from counts?', 'a' => 'Divide every count by the smallest, then scale to whole numbers — 180:62:58:20 is about 9:3:3:1.'],
            ['q' => 'What does a large chi-square mean?', 'a' => 'The observations are unlikely under the expected ratio: look for linkage, lethality or a scoring error.'],
            ['q' => 'What does the Phenotypic Ratio actually calculate?', 'a' => <<<'TXT'
            It returns total scored, ratio to the smallest class, class 1 share and chi-square vs 9:3:3:1. Each one is derived by the formula on this page, so you can check any figure by hand.
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
