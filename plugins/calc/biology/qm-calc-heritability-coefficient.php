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
    'meta' => ['title' => 'Heritability Coefficient Calculator — Biology', 'description' => <<<'TXT'
    Heritability is the share of the variation in a trait, in one population in one environment, that is attributable to genetic differences. Enter the values you…
    TXT, 'h1' => 'Heritability Coefficient Calculator', 'updated' => '2026-10-29'],
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
        Heritability is the share of the variation in a trait, in one population in one environment, that is attributable to genetic differences. It returns heritability from parent-offspring regression, heritability from half-sib correlation, heritability from variance components and response to selection, and the panel shows all of them at once.
        
        This calculator estimates narrow-sense heritability from parent-offspring or half-sib data and shows the expected response to selection.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Heritability Coefficient', 'html' => <<<'TXT'
            <p>h² = V_A ÷ (V_A + V_E); h² = 2r(parent, offspring); h² = 4r(half sibs); R = h² × S</p>
            <figure class="calc-figure"><img src="/uploads/biology/heritability-coefficient.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Heritability Coefficient Calculator — Additive plus environmental variance sets the ceiling." title="Heritability Coefficient Calculator"><figcaption>Additive plus environmental variance sets the ceiling.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>V_A</code></td><td>additive genetic variance</td><td>—</td></tr><tr><td><code>V_E</code></td><td>environmental variance</td><td>—</td></tr><tr><td><code>S</code></td><td>selection differential</td><td>SD</td></tr><tr><td><code>R</code></td><td>response to selection</td><td>SD</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Heritability Coefficient?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: correlation between parent and offspring of <strong>0.35</strong>, correlation among half sibs of <strong>0.09</strong>, additive genetic variance of <strong>0.4</strong>, environmental variance of <strong>0.6</strong>, selection differential of <strong>1.2</strong> SD.</p>
            <p>Substituting them into the formula gives heritability from parent-offspring regression of <strong>0.7</strong>, heritability from half-sib correlation of <strong>0.36</strong>, heritability from variance components of <strong>0.4</strong>, response to selection of <strong>0.48</strong> SD.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 – 0.2</td><td><strong>Low</strong></td><td>environment dominates; breeding progress is slow</td></tr><tr><td>0.2 – 0.4</td><td><strong>Moderate</strong></td><td>typical for growth and yield traits</td></tr><tr><td>0.4 – 0.7</td><td><strong>High</strong></td><td>typical for body size and milk yield</td></tr><tr><td>0.7 – 1.0</td><td><strong>Very high</strong></td><td>highly canalised traits such as coat pattern</td></tr></tbody></table>
            <ul><li><p>Heritability is a property of a population in an environment, not of a gene. The same trait can be 0.6 in a uniform greenhouse and 0.2 in a variable field.</p></li><li><p>Narrow-sense heritability counts only additive effects, because that is the part that responds to selection; broad-sense includes dominance and interaction.</p></li><li><p>The breeder's equation R = h²S is the most useful form: it turns heritability into a prediction of how much the next generation moves.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Quoting a heritability figure for a trait without saying which population and environment.</li><li>Using a parent-offspring correlation from different environments, which inflates h².</li><li>Assuming that a high heritability means a trait cannot be changed by the environment.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the difference between h² and H²?', 'a' => 'h² (narrow sense) is additive variance over total; H² (broad sense) is all genetic variance over total. Only h² predicts selection response.'],
            ['q' => 'Can heritability be greater than 1?', 'a' => 'Not in a properly estimated design; a value above 1 signals a data or model error.'],
            ['q' => 'What does the Heritability Coefficient actually calculate?', 'a' => <<<'TXT'
            It returns heritability from parent-offspring regression, heritability from half-sib correlation, heritability from variance components and response to selection. Each one is derived by the formula on this page, so you can check any figure by hand.
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
