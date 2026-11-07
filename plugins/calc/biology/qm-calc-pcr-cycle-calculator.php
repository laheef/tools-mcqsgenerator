<?php

/**
 * PCR Cycle Calculator
 * /biology/pcr-cycle-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PCR Cycle Calculator',
    'meta' => ['title' => 'PCR Cycle Calculator: Formula, Steps & Results', 'description' => 'A PCR run is a few dozen repeats of three steps, and the total time on the machine is simply the sum of those steps plus the ramp between them.', 'h1' => 'PCR Cycle Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'denature_t',
                            'label' => 'Denaturation time',
                            'type' => 'number',
                            'suffix' => 's',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'anneal_t',
                            'label' => 'Annealing time',
                            'type' => 'number',
                            'suffix' => 's',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'extend_t',
                            'label' => 'Extension time',
                            'type' => 'number',
                            'suffix' => 's',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'cycles',
                            'label' => 'Cycles',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '35',
                        ],
                        [
                            'name' => 'ramp',
                            'label' => 'Ramp time between steps',
                            'type' => 'number',
                            'suffix' => 's',
                            'help' => 'Per transition',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'copies',
                            'label' => 'Starting copies',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'efficiency',
                            'label' => 'Amplification efficiency',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => '100% doubles every cycle',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '95',
                        ],
                        [
                            'name' => 'cycle_time',
                            'label' => 'Time per cycle',
                            'type' => 'number',
                            'suffix' => 's',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_time',
                            'label' => 'Total run time',
                            'type' => 'number',
                            'suffix' => 'min',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'final_copies',
                            'label' => 'Copies at the end',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Fold amplification',
                            'type' => 'number',
                            'suffix' => 'x',
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
            'title' => 'Run',
            'results' => ['cycle_time' => 'denature_t+anneal_t+extend_t+3*ramp', 'total_time' => '(denature_t+anneal_t+extend_t+3*ramp)*cycles/60', 'fold' => 'pow(1+efficiency/100,cycles)', 'final_copies' => 'copies*pow(1+efficiency/100,cycles)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A PCR run is a few dozen repeats of three steps, and the total time on the machine is simply the sum of those steps plus the ramp between them. It returns time per cycle, total run time, fold amplification and copies at the end, and the panel shows all of them at once.
        
        This calculator turns your protocol into the time per cycle, the time to the answer and the number of copies produced.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the PCR Cycle', 'html' => <<<'TXT'
            <p>Time per cycle = t_denature + t_anneal + t_extend + 3 × ramp; copies = N₀ × (1 + E)^cycles</p>
            <figure class="calc-figure"><img src="/uploads/biology/pcr-cycle-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: PCR Cycle Calculator — Denature, anneal, extend — repeated until the product dominates." title="PCR Cycle Calculator"><figcaption>Denature, anneal, extend — repeated until the product dominates.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>E</code></td><td>efficiency per cycle (1.0 = perfect doubling)</td><td>—</td></tr><tr><td><code>N₀</code></td><td>template copies at the start</td><td>copies</td></tr><tr><td><code>t</code></td><td>time for each step</td><td>s</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the PCR Cycle?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: denaturation time of <strong>30</strong> s, annealing time of <strong>30</strong> s, extension time of <strong>45</strong> s, cycles of <strong>35</strong>, ramp time between steps of <strong>4</strong> s, starting copies of <strong>1,000</strong>, amplification efficiency of <strong>95</strong>%.</p>
            <p>Substituting them into the formula gives time per cycle of <strong>117</strong> s, total run time of <strong>68.25</strong> min, fold amplification of <strong>14,164,831,011</strong> x, copies at the end of <strong>14,164,831,011,411</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>90 – 100%</td><td><strong>Efficient</strong></td><td>clean primers, good template quality</td></tr><tr><td>80 – 90%</td><td><strong>Workable</strong></td><td>some loss per cycle; enough product in 35 cycles</td></tr><tr><td>below 80%</td><td><strong>Poor</strong></td><td>inhibitors, primer dimers or wrong annealing temperature</td></tr></tbody></table>
            <ul><li><p>Ramp time is not small: a three-step protocol ramps six times per cycle, and on a slow block that can add half a minute to every cycle.</p></li><li><p>Two-step protocols drop the separate extension step because the polymerase works at the annealing temperature, which is why fast protocols are so much shorter.</p></li><li><p>Efficiency above 100% in real data almost always means the baseline was set badly, not that the reaction invented copies.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Forgetting the initial hot start and the final extension when quoting a run time.</li><li>Cutting extension time below about 30 s per kilobase for a long product.</li><li>Adding cycles instead of fixing a low efficiency — beyond about 40 cycles the plateau gives artefacts, not more product.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How long does a 35-cycle PCR take?', 'a' => 'With 30 s denaturation, 30 s annealing, 45 s extension and 4 s ramps, about 70 minutes.'],
            ['q' => 'How many copies after 30 cycles?', 'a' => 'At 95% efficiency the target is multiplied by roughly 1.95³⁰ ≈ 5 × 10⁸.'],
            ['q' => 'What does the PCR Cycle actually calculate?', 'a' => <<<'TXT'
            It returns time per cycle, total run time, fold amplification and copies at the end. Each one is derived by the formula on this page, so you can check any figure by hand.
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
