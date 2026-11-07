<?php

/**
 * ATP / Cellular Respiration Energy Yield Calculator
 * /biology/atp-cellular-respiration-energy-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'ATP / Cellular Respiration Energy Yield Calculator',
    'meta' => ['title' => 'ATP / Cellular Respiration Energy Yield Calculator', 'description' => <<<'TXT'
    How much ATP a fuel yields depends on the pathway it enters and on which shuttle carries its electrons into the mitochondrion. It returns total ATP and energy…
    TXT, 'h1' => 'ATP / Cellular Respiration Energy Yield Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fuel',
                            'label' => 'Fuel',
                            'type' => 'select',
                            'options' => [
                                'Glucose (aerobic)' => '1',
                                'Glucose (anaerobic)' => '2',
                                'Palmitate (C16)' => '3',
                                'Lactate' => '4',
                                'Glutamate' => '5',
                            ],
                            'control' => 'SELECT',
                            'default' => 'Glucose (aerobic)',
                        ],
                        [
                            'name' => 'nadh',
                            'label' => 'NADH produced',
                            'type' => 'number',
                            'help' => 'From glycolysis, pyruvate oxidation and the cycle',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'fadh2',
                            'label' => 'FADH₂ produced',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'atp_sub',
                            'label' => 'ATP (or GTP) made directly',
                            'type' => 'number',
                            'help' => 'Substrate-level phosphorylation',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'atp_total',
                            'label' => 'Total ATP',
                            'type' => 'number',
                            'suffix' => 'ATP',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'energy',
                            'label' => 'Energy captured',
                            'type' => 'number',
                            'suffix' => 'kJ/mol',
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
            'title' => 'Yield',
            'results' => ['atp_total' => 'if_else(fuel==2, atp_sub*2, atp_sub+nadh*2.5+fadh2*1.5)', 'energy' => '(atp_sub+nadh*2.5+fadh2*1.5)*30.5'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        How much ATP a fuel yields depends on the pathway it enters and on which shuttle carries its electrons into the mitochondrion. It returns total ATP and energy captured, and the panel shows all of them at once.
        
        This calculator totals ATP, NADH and FADH₂ for glucose, fatty acids and amino acids using the modern P/O ratios of 2.5 and 1.5.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the ATP / Cellular Respiration Energy Yield', 'html' => <<<'TXT'
            <p>ATP total = substrate-level ATP + 2.5 × NADH + 1.5 × FADH₂</p>
            <figure class="calc-figure"><img src="/uploads/biology/atp-cellular-respiration-energy-yield.svg" width="720" height="300" loading="lazy" alt="Animated diagram: ATP / Cellular Respiration Energy Yield Calculator — Yield by pathway for the same starting material." title="ATP / Cellular Respiration Energy Yield Calculator"><figcaption>Yield by pathway for the same starting material.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>NADH</code></td><td>reducing equivalents delivered to complex I</td><td>mol/mol fuel</td></tr><tr><td><code>FADH₂</code></td><td>equivalents delivered via complex II</td><td>mol/mol fuel</td></tr><tr><td><code>P/O ratio</code></td><td>ATP per oxygen atom reduced (2.5 for NADH, 1.5 for FADH₂)</td><td>—</td></tr><tr><td><code>energy</code></td><td>chemical energy captured at ~30.5 kJ/mol ATP</td><td>kJ/mol</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> P/O ratios from the current biochemistry consensus (2.5 for NADH, 1.5 for FADH₂).</p>
            TXT],
            ['title' => 'How do I use the ATP / Cellular Respiration Energy Yield?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: fuel set to <strong>1.0</strong>, nadh produced of <strong>10</strong>, fadh₂ produced of <strong>2</strong>, atp (or gtp) made directly of <strong>4</strong>.</p>
            <p>Substituting them into the formula gives total atp of <strong>32</strong> ATP, energy captured of <strong>976</strong> kJ/mol.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>2 ATP</td><td><strong>Anaerobic glycolysis</strong></td><td>glucose to lactate, no oxygen needed</td></tr><tr><td>30 – 32 ATP</td><td><strong>Aerobic glucose</strong></td><td>the textbook figure; 32 with the malate–aspartate shuttle</td></tr><tr><td>106 ATP</td><td><strong>Palmitate</strong></td><td>the classic fatty-acid figure, β-oxidation plus the cycle</td></tr></tbody></table>
            <ul><li><p>The older textbooks said 38 ATP for glucose, using P/O ratios of 3 and 2. The modern values 2.5 and 1.5 give 30–32.</p></li><li><p>The glycerol-3-phosphate shuttle costs one ATP per cytosolic NADH, which is why muscle tissue reports 30 and liver 32 for the same glucose.</p></li><li><p>Anaerobic yield is small but fast: 2 ATP per glucose, and lactate is regenerated to keep glycolysis running.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Counting the 2 ATP from glycolysis twice.</li><li>Using 3 and 2 as P/O ratios and then comparing with a modern paper.</li><li>Forgetting that amino-acid entry points differ — glutamate enters as α-ketoglutarate and yields far less than a fatty acid.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why 30 and 32 ATP for glucose?', 'a' => <<<'TXT'
            The difference is the shuttle used to move cytosolic NADH into the mitochondrion: the malate–aspartate shuttle preserves it (32), the glycerol-3-phosphate shuttle costs 1 ATP (30).
            TXT],
            ['q' => 'How much ATP does a fatty acid give?', 'a' => 'Palmitate yields 106 ATP by β-oxidation plus the cycle — more than three times glucose, per molecule, because it is far more reduced.'],
            ['q' => 'What does the ATP / Cellular Respiration Energy Yield actually calculate?', 'a' => 'It returns total ATP and energy captured. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
