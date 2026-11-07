<?php

/**
 * Odds Ratio Calculator for Genetics
 * /biology/genetic-odds-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Odds Ratio Calculator for Genetics',
    'meta' => ['title' => 'Odds Ratio Calculator for Genetics — Biology', 'description' => 'A genetic odds ratio compares how often a variant appears in cases and in controls. It returns odds ratio, variant frequency in cases, variant frequency in…', 'h1' => 'Odds Ratio Calculator for Genetics', 'updated' => '2026-10-29'],
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
                            'label' => 'Cases with the variant',
                            'type' => 'number',
                            'help' => 'Exposed cases',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'b',
                            'label' => 'Cases without the variant',
                            'type' => 'number',
                            'help' => 'Unexposed cases',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'c',
                            'label' => 'Controls with the variant',
                            'type' => 'number',
                            'help' => 'Exposed controls',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'dd',
                            'label' => 'Controls without the variant',
                            'type' => 'number',
                            'help' => 'Unexposed controls',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                        [
                            'name' => 'odds_ratio',
                            'label' => 'Odds ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ci_low',
                            'label' => '95% confidence, lower',
                            'type' => 'number',
                            'help' => 'Woolf interval',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ci_high',
                            'label' => '95% confidence, upper',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'relative_risk',
                            'label' => 'Relative risk',
                            'type' => 'number',
                            'help' => 'Cases ÷ controls risk',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'case_pct',
                            'label' => 'Variant frequency in cases',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'control_pct',
                            'label' => 'Variant frequency in controls',
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
            'title' => 'Association',
            'results' => [
                'odds_ratio' => '(a/c)/(b/dd)',
                'case_pct' => 'a/(a+b)*100',
                'control_pct' => 'c/(c+dd)*100',
                'relative_risk' => '(a/(a+b))/(c/(c+dd))',
                'ci_low' => 'exp(ln((a/c)/(b/dd))-1.96*sqrt(1/a+1/b+1/c+1/dd))',
                'ci_high' => 'exp(ln((a/c)/(b/dd))+1.96*sqrt(1/a+1/b+1/c+1/dd))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A genetic odds ratio compares how often a variant appears in cases and in controls. It returns odds ratio, variant frequency in cases, variant frequency in controls and relative risk, and the panel shows all of them at once.
        
        From four counts — carriers and non-carriers in each group — you get the odds ratio, the relative risk and their 95% confidence intervals, which is the standard first pass in a genetic association study.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Odds Ratio for Genetics', 'html' => <<<'TXT'
            <p>OR = (a ÷ c) ÷ (b ÷ d). RR = (a ÷ (a+b)) ÷ (c ÷ (c+d)). 95% CI = exp(ln OR ± 1.96 × √(1/a + 1/b + 1/c + 1/d))</p>
            <figure class="calc-figure"><img src="/uploads/biology/genetic-odds-ratio.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Odds Ratio Calculator for Genetics — Odds ratio as the case table changes" title="Odds Ratio Calculator for Genetics"><figcaption>Odds ratio as the case table changes</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>a, b</code></td><td>cases with and without the variant</td><td>people</td></tr><tr><td><code>c, d</code></td><td>controls with and without the variant</td><td>people</td></tr><tr><td><code>OR</code></td><td>odds of the variant in cases over the odds in controls</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Odds Ratio for Genetics?', 'html' => <<<'TXT'
            <ol><li>Count cases with and without the variant, then controls with and without it.</li><li>Enter the four numbers in the order the table shows them.</li><li>Read the odds ratio, the relative risk and the 95% interval — the interval is what decides whether the result is real.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: cases with the variant of <strong>60</strong>, cases without the variant of <strong>40</strong>, controls with the variant of <strong>30</strong>, controls without the variant of <strong>70</strong>.</p>
            <p>Substituting them into the formula gives odds ratio of <strong>3.5</strong>, variant frequency in cases of <strong>60</strong>%, variant frequency in controls of <strong>30</strong>%, relative risk of <strong>2</strong>, 95% confidence, lower of <strong>1.95</strong>, 95% confidence, upper of <strong>6.29</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>OR = 1</td><td><strong>No association</strong></td><td>the interval crossing 1 is the usual test of significance</td></tr><tr><td>OR 1.2 – 2</td><td><strong>Modest association</strong></td><td>typical of most complex-trait variants</td></tr><tr><td>OR above 3</td><td><strong>Strong association</strong></td><td>check for genotyping artefacts and stratification</td></tr></tbody></table>
            <ul><li><p>An odds ratio of 2 does not mean twice the risk. For a rare disease the two numbers are close; for a common one they diverge, and RR is the honest measure.</p></li><li><p>The confidence interval, not the p-value, is what tells you whether the study was big enough. An OR of 1.8 with an interval of 0.6–5.4 is a null result.</p></li><li><p>Population stratification — mixing two ancestries with different allele frequencies — creates associations that vanish once it is corrected for.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Filling in the table by column instead of by row, which inverts the ratio.</li><li>Reporting OR as if it were relative risk for a common disease.</li><li>Ignoring a control group whose variant frequency does not match the published population.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does an odds ratio of 1 mean?', 'a' => 'The variant is equally common in cases and controls — no association.'],
            ['q' => 'When is a confidence interval significant?', 'a' => 'When it does not include 1.0. The p-value adds nothing that the interval does not already show.'],
            ['q' => 'Why is my OR so much larger than the RR?', 'a' => 'Because the disease is common: odds overestimate risk when the outcome is not rare.'],
            ['q' => 'What does the Odds Ratio for Genetics actually calculate?', 'a' => <<<'TXT'
            It returns odds ratio, variant frequency in cases, variant frequency in controls and relative risk. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
