<?php

/**
 * Fold Change Calculator
 * /biology/fold-change
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fold Change Calculator',
    'meta' => ['title' => 'Fold Change Calculator: Formula, Steps & Results', 'description' => 'Fold change compares a treated value with a control: 2 means doubled, 0.5 means halved. It returns fold change, log₂ fold change, percent change and…', 'h1' => 'Fold Change Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'treated',
                            'label' => 'Treated value',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '240',
                        ],
                        [
                            'name' => 'control',
                            'label' => 'Control value',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Fold change',
                            'type' => 'number',
                            'suffix' => '×',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'log2fc',
                            'label' => 'log₂ fold change',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pct',
                            'label' => 'Percent change',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'inverse',
                            'label' => 'Reciprocal fold change',
                            'type' => 'number',
                            'suffix' => '×',
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
            'title' => 'Fold change',
            'results' => ['fold' => 'treated/control', 'log2fc' => 'log2(treated/control)', 'pct' => '(treated/control-1)*100', 'inverse' => 'control/treated'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fold change compares a treated value with a control: 2 means doubled, 0.5 means halved. It returns fold change, log₂ fold change, percent change and reciprocal fold change, and the panel shows all of them at once.
        
        This calculator handles the direction properly, works with averages and replicates, and warns when the two conventions (treated/control versus control/treated) give different answers.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Fold Change', 'html' => <<<'TXT'
            <p>Fold change = treated ÷ control; log₂ fold change = log₂(treated/control)</p>
            <figure class="calc-figure"><img src="/uploads/biology/fold-change.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Fold Change Calculator — Control and treated, and the ratio between them." title="Fold Change Calculator"><figcaption>Control and treated, and the ratio between them.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>treated</code></td><td>mean of the treated group</td><td>any</td></tr><tr><td><code>control</code></td><td>mean of the control group</td><td>any</td></tr><tr><td><code>log₂ FC</code></td><td>symmetric measure: 1 is up twofold, −1 is down twofold</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Fold Change?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: treated value of <strong>240</strong>, control value of <strong>100</strong>.</p>
            <p>Substituting them into the formula gives fold change of <strong>2.4</strong> ×, log₂ fold change of <strong>1.26</strong>, percent change of <strong>140</strong>%, reciprocal fold change of <strong>0.4167</strong> ×.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>2 and above</td><td><strong>Upregulated</strong></td><td>at least doubled</td></tr><tr><td>0.5 – 2</td><td><strong>Unchanged</strong></td><td>within the usual biological noise</td></tr><tr><td>0.5 and below</td><td><strong>Downregulated</strong></td><td>at least halved</td></tr></tbody></table>
            <ul><li><p>Fold change on a linear scale is asymmetric: up twofold is 2, down twofold is 0.5. log₂ makes the two symmetric, which is why it is used in expression analysis.</p></li><li><p>A fold change without a measure of variance is nearly meaningless — a 3× change from n=2 can be noise.</p></li><li><p>With qPCR, fold change is usually computed as 2^−ΔΔCt, which is the same thing expressed through cycle thresholds.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Comparing a treated sample with a different baseline than the one the graph uses.</li><li>Averaging fold changes across replicates instead of computing them from the means, or the reverse.</li><li>Going from a negative control value close to zero, where small absolute differences become enormous ratios.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is a 2-fold change significant?', 'a' => 'Not by itself. Significance needs the variance of the replicates; fold change is an effect size.'],
            ['q' => 'Why do some papers report log₂ fold change?', 'a' => 'Because it is symmetric and averages sensibly across genes and conditions.'],
            ['q' => 'What does the Fold Change actually calculate?', 'a' => <<<'TXT'
            It returns fold change, log₂ fold change, percent change and reciprocal fold change. Each one is derived by the formula on this page, so you can check any figure by hand.
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
