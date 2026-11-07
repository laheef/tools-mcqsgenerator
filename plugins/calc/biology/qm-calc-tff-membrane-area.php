<?php

/**
 * TFF Membrane Area and Flux Calculator
 * /biology/tff-membrane-area
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'TFF Membrane Area and Flux Calculator',
    'meta' => ['title' => 'TFF Membrane Area and Flux Calculator — Biology', 'description' => 'A tangential-flow filtration step is sized by the volume to process and the flux the membrane will hold, and the membrane area then fixes how long the step…', 'h1' => 'TFF Membrane Area and Flux Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'volume',
                            'label' => 'Batch volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'flux',
                            'label' => 'Permeate flux',
                            'type' => 'number',
                            'suffix' => 'L/m²/h',
                            'help' => '30–100 for a typical mAb step',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'concentration',
                            'label' => 'Concentration factor',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'diavolumes',
                            'label' => 'Diafiltration volumes',
                            'type' => 'number',
                            'suffix' => 'DV',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'cassette',
                            'label' => 'Area per cassette',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.5',
                        ],
                        [
                            'name' => 'load',
                            'label' => 'Maximum load per m²',
                            'type' => 'number',
                            'suffix' => 'L/m²',
                            'help' => 'Process-specific',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Membrane area required',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cassettes',
                            'label' => 'Cassettes to install',
                            'type' => 'number',
                            'suffix' => 'cassettes',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'df_volume',
                            'label' => 'Diafiltration buffer needed',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'time',
                            'label' => 'Estimated step time',
                            'type' => 'number',
                            'suffix' => 'h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'load_area',
                            'label' => 'Area set by the load limit',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'binding',
                            'label' => 'Which limit sets the area (1 = flux, 2 = load)',
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
            'title' => 'Sizing',
            'results' => [
                'area' => 'max(volume/load,volume/flux)',
                'cassettes' => 'ceil(max(volume/load,volume/flux)/cassette)',
                'df_volume' => 'volume/concentration*diavolumes',
                'time' => '(volume/area+volume/concentration*diavolumes/area)/flux+0.5',
                'load_area' => 'volume/load',
                'binding' => 'if_else(volume/load>volume/flux,2,1)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A tangential-flow filtration step is sized by the volume to process and the flux the membrane will hold, and the membrane area then fixes how long the step takes. It returns membrane area required, cassettes to install, diafiltration buffer needed and estimated step time, and the panel shows all of them at once.
        
        This calculator returns the area, the number of cassettes, the diafiltration volume and the step time at your flux.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the TFF Membrane Area and Flux', 'html' => <<<'TXT'
            <p>Area = max(batch ÷ load capacity, batch ÷ flux-based area); DF buffer = (V ÷ CF) × DV; time ≈ (V + V·DV/CF) ÷ (area × flux)</p>
            <figure class="calc-figure"><img src="/uploads/biology/tff-membrane-area.svg" width="720" height="300" loading="lazy" alt="Animated diagram: TFF Membrane Area and Flux Calculator — Feed, retentate and permeate: area sets the pace of the step." title="TFF Membrane Area and Flux Calculator"><figcaption>Feed, retentate and permeate: area sets the pace of the step.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>V</code></td><td>starting batch volume</td><td>L</td></tr><tr><td><code>J</code></td><td>permeate flux</td><td>L/m²/h</td></tr><tr><td><code>CF</code></td><td>concentration factor (final ÷ initial volume)</td><td>×</td></tr><tr><td><code>DV</code></td><td>diafiltration volumes</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the TFF Membrane Area and Flux?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: batch volume of <strong>500</strong> L, permeate flux of <strong>60</strong> L/m²/h, concentration factor of <strong>8</strong> x, diafiltration volumes of <strong>5</strong> DV, area per cassette of <strong>2.5</strong> m², maximum load per m² of <strong>100</strong> L/m².</p>
            <p>Substituting them into the formula gives membrane area required of <strong>8.33</strong> m², cassettes to install of <strong>4</strong> cassettes, diafiltration buffer needed of <strong>312.5</strong> L, estimated step time of <strong>2.12</strong> h, area set by the load limit of <strong>5</strong> m², which limit sets the area (1 = flux, 2 = load) of <strong>1</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>30 – 60</td><td><strong>Conservative flux</strong></td><td>high-mass, fouling feeds</td></tr><tr><td>60 – 100</td><td><strong>Typical</strong></td><td>a well-behaved mAb ultrafiltration step</td></tr><tr><td>above 100</td><td><strong>Aggressive</strong></td><td>only with pre-filtered, low-titre streams</td></tr></tbody></table>
            <ul><li><p>Flux falls as the feed concentrates, so the time estimate is optimistic unless the quoted flux is the average over the step, not the clean-water value.</p></li><li><p>Diafiltration is done at constant volume: you add buffer at the rate permeate leaves, and the buffer volume needed is (retentate volume) × DV.</p></li><li><p>Install at least one cassette more than the calculation suggests; a single cassette leaves no margin for a fouled membrane.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using clean-water flux for a cell-culture feed, where fouling cuts it by half or more.</li><li>Forgetting the hold-up volume of the system and tubing when quoting yield.</li><li>Sizing exactly to the load limit and then having to dilute the batch to finish the step.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/enzyme-specific-activity-yield">Specific activity and yield</a>. <a href="/biology/specific-productivity-qp">Specific productivity</a>. <a href="/chemistry/molarity">Molarity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I choose a cassette size?', 'a' => 'Round the calculated area up to whole cassettes, then check the retentate channel height gives a sensible crossflow for your pump.'],
            ['q' => 'What is one diafiltration volume?', 'a' => 'A volume of buffer equal to the current retentate volume; five volumes remove about 99.3% of a freely permeating impurity.'],
            ['q' => 'What does the TFF Membrane Area and Flux actually calculate?', 'a' => <<<'TXT'
            It returns membrane area required, cassettes to install, diafiltration buffer needed and estimated step time. Each one is derived by the formula on this page, so you can check any figure by hand.
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
