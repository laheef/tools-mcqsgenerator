<?php

/**
 * Enzyme Kinetics: Specific Activity and Yield
 * /biology/enzyme-specific-activity-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Enzyme Kinetics: Specific Activity and Yield',
    'meta' => ['title' => 'Enzyme Kinetics: Specific Activity and Yield', 'description' => 'Purification tables report specific activity and fold purification, and both come from the same three numbers: total protein, total activity and the starting…', 'h1' => 'Enzyme Kinetics: Specific Activity and Yield', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'total_protein',
                            'label' => 'Total protein in this step',
                            'type' => 'number',
                            'suffix' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'total_activity',
                            'label' => 'Total activity in this step',
                            'type' => 'number',
                            'suffix' => 'U',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5400',
                        ],
                        [
                            'name' => 'start_protein',
                            'label' => 'Total protein in the starting material',
                            'type' => 'number',
                            'suffix' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '900',
                        ],
                        [
                            'name' => 'start_activity',
                            'label' => 'Total activity in the starting material',
                            'type' => 'number',
                            'suffix' => 'U',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7200',
                        ],
                        [
                            'name' => 'specific',
                            'label' => 'Specific activity',
                            'type' => 'number',
                            'suffix' => 'U/mg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'start_specific',
                            'label' => 'Starting specific activity',
                            'type' => 'number',
                            'suffix' => 'U/mg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Fold purification',
                            'type' => 'number',
                            'suffix' => '×',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'yield',
                            'label' => 'Activity yield',
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
            'title' => 'Purification',
            'results' => ['specific' => 'total_activity/total_protein', 'start_specific' => 'start_activity/start_protein', 'fold' => '(total_activity/total_protein)/(start_activity/start_protein)', 'yield' => 'total_activity/start_activity*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Purification tables report specific activity and fold purification, and both come from the same three numbers: total protein, total activity and the starting values. It returns specific activity, starting specific activity, fold purification and activity yield, and the panel shows all of them at once.
        
        This calculator builds the two summary figures for any step and shows what the recovery cost.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Enzyme Kinetics: Specific Activity and Yield', 'html' => <<<'TXT'
            <p>Specific activity = total activity ÷ total protein; fold = specific ÷ starting specific; yield = activity recovered ÷ activity started with × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/enzyme-specific-activity-yield.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Enzyme Kinetics: Specific Activity and Yield — Activity over protein gives specific activity; compare it with the start." title="Enzyme Kinetics: Specific Activity and Yield"><figcaption>Activity over protein gives specific activity; compare it with the start.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>total protein</code></td><td>protein in the fraction</td><td>mg</td></tr><tr><td><code>total activity</code></td><td>units in the fraction</td><td>U</td></tr><tr><td><code>fold</code></td><td>purification factor</td><td>×</td></tr><tr><td><code>yield</code></td><td>recovery of activity</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Enzyme Kinetics: Specific Activity and Yield?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: total protein in this step of <strong>45</strong> mg, total activity in this step of <strong>5,400</strong> U, total protein in the starting material of <strong>900</strong> mg, total activity in the starting material of <strong>7,200</strong> U.</p>
            <p>Substituting them into the formula gives specific activity of <strong>120</strong> U/mg, starting specific activity of <strong>8</strong> U/mg, fold purification of <strong>15</strong> ×, activity yield of <strong>75</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Fold purification and yield always trade off: the step that purifies most is usually the one that loses the most activity.</p></li><li><p>A step with a fold below 1 has removed protein and activity in the same proportion — it is a concentration step, not a purification step.</p></li><li><p>Specific activity is only comparable if it is measured at the same temperature, pH and substrate concentration in every row of the table.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using the protein concentration of the fraction instead of the total.</li><li>Adding the yields of successive steps — they multiply, not add.</li><li>Comparing specific activities measured with different substrates.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/enzyme-unit-converter">Enzyme unit converter</a>. <a href="/chemistry/enzyme-activity">Enzyme activity</a>. <a href="/biology/bca-assay-calculator">BCA assay</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good fold purification?', 'a' => 'There is no target; what matters is that specific activity rises and enough activity survives for the next step.'],
            ['q' => 'Why did my yield rise?', 'a' => 'Usually activation or removal of an inhibitor — or an assay artefact. Re-measure before believing it.'],
            ['q' => 'What does the Enzyme Kinetics: Specific Activity and Yield actually calculate?', 'a' => <<<'TXT'
            It returns specific activity, starting specific activity, fold purification and activity yield. Each one is derived by the formula on this page, so you can check any figure by hand.
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
