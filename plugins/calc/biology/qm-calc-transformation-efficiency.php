<?php

/**
 * Transformation Efficiency Calculator
 * /biology/transformation-efficiency
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Transformation Efficiency Calculator',
    'meta' => ['title' => 'Transformation Efficiency Calculator — Biology', 'description' => 'Transformation efficiency is the number of transformants per microgram of plasmid — the number that tells you whether your competent cells are any good.', 'h1' => 'Transformation Efficiency Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'colonies',
                            'label' => 'Colonies on the plate',
                            'type' => 'number',
                            'suffix' => 'CFU',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '320',
                        ],
                        [
                            'name' => 'volume_plated',
                            'label' => 'Volume plated',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.1',
                        ],
                        [
                            'name' => 'recovery',
                            'label' => 'Recovery volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'help' => 'SOC or LB used to resuspend',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'dna',
                            'label' => 'Plasmid DNA transformed',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution plated',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10 if you plated 1/10 of the recovery',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'efficiency',
                            'label' => 'Transformation efficiency',
                            'type' => 'number',
                            'suffix' => 'CFU/µg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_colonies',
                            'label' => 'Total transformants',
                            'type' => 'number',
                            'suffix' => 'CFU',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ng',
                            'label' => 'Transformants per ng',
                            'type' => 'number',
                            'suffix' => 'CFU/ng',
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
            'title' => 'Efficiency',
            'results' => ['efficiency' => 'colonies/(volume_plated/recovery)/dna*1000*dilution', 'total_colonies' => 'colonies/(volume_plated/recovery)*dilution', 'per_ng' => 'colonies/(volume_plated/recovery)/dna*dilution'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Transformation efficiency is the number of transformants per microgram of plasmid — the number that tells you whether your competent cells are any good. It returns transformation efficiency, total transformants and transformants per ng, and the panel shows all of them at once.
        
        This calculator computes it from colonies, plated volume and plasmid mass, and flags the values that mean something went wrong.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Transformation Efficiency', 'html' => <<<'TXT'
            <p>Efficiency (CFU/µg) = colonies × (recovery volume ÷ plated volume) × dilution ÷ µg DNA</p>
            <figure class="calc-figure"><img src="/uploads/biology/transformation-efficiency.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Transformation Efficiency Calculator — Colonies scaled to the whole recovery, divided by the DNA mass." title="Transformation Efficiency Calculator"><figcaption>Colonies scaled to the whole recovery, divided by the DNA mass.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>colonies</code></td><td>colonies on the countable plate</td><td>CFU</td></tr><tr><td><code>recovery</code></td><td>volume the cells were resuspended in</td><td>mL</td></tr><tr><td><code>volume plated</code></td><td>fraction of the recovery that was plated</td><td>mL</td></tr><tr><td><code>dna</code></td><td>mass of plasmid added</td><td>ng</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Transformation Efficiency?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: colonies on the plate of <strong>320</strong> CFU, volume plated of <strong>0.1</strong> mL, recovery volume of <strong>1</strong> mL, plasmid dna transformed of <strong>10</strong> ng, dilution plated of <strong>1</strong> ×.</p>
            <p>Substituting them into the formula gives transformation efficiency of <strong>320,000</strong> CFU/µg, total transformants of <strong>3,200</strong> CFU, transformants per ng of <strong>320</strong> CFU/ng.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>above 1 × 10⁸</td><td><strong>Excellent</strong></td><td>chemically competent commercial-grade cells</td></tr><tr><td>1 × 10⁷ – 1 × 10⁸</td><td><strong>Good</strong></td><td>fine for cloning and library work</td></tr><tr><td>1 × 10⁶ – 1 × 10⁷</td><td><strong>Adequate</strong></td><td>check heat shock, antibiotics and DNA quality</td></tr><tr><td>below 1 × 10⁶</td><td><strong>Poor</strong></td><td>usually competent-cell preparation or a salt problem</td></tr></tbody></table>
            <ul><li><p>Efficiency drops sharply with plasmid size: a 10 kb construct transforms several times less well than a 3 kb one, and that is not a competent-cell problem.</p></li><li><p>Plate a range of volumes (10 µL and 100 µL of the recovery) so at least one plate is countable.</p></li><li><p>The antibiotic must be at the right concentration and the plates fresh; old ampicillin plates give satellite colonies that look like transformants.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using the plated volume as if it were the whole recovery.</li><li>Reporting CFU/µg using the mass of DNA in the ligation rather than the plasmid transformed.</li><li>Reading efficiency from a plate with 2000 colonies, where the count is meaningless.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good transformation efficiency?', 'a' => '10⁸ CFU/µg or better for chemically competent cells; 10⁹–10¹⁰ for electroporation.'],
            ['q' => 'Why is my efficiency low for a ligation?', 'a' => 'Ligations contain nicked and linear DNA; efficiency is quoted for supercoiled plasmid.'],
            ['q' => 'What does the Transformation Efficiency actually calculate?', 'a' => <<<'TXT'
            It returns transformation efficiency, total transformants and transformants per ng. Each one is derived by the formula on this page, so you can check any figure by hand.
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
