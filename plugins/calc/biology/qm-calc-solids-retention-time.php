<?php

/**
 * Solids Retention Time Calculator (SRT)
 * /biology/solids-retention-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Solids Retention Time Calculator (SRT)',
    'meta' => ['title' => 'Solids Retention Time Calculator (SRT) — Biology', 'description' => 'Solids retention time, or sludge age, is how long a bacterium stays in the system, and it decides which organisms survive there. It returns solids inventory…', 'h1' => 'Solids Retention Time Calculator (SRT)', 'updated' => '2026-10-29'],
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
                            'label' => 'Aeration tank volume',
                            'type' => 'number',
                            'suffix' => 'm³',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '750',
                        ],
                        [
                            'name' => 'mlss',
                            'label' => 'MLSS',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'waste',
                            'label' => 'Waste sludge flow',
                            'type' => 'number',
                            'suffix' => 'm³/day',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'waste_mlss',
                            'label' => 'Waste sludge MLSS',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8000',
                        ],
                        [
                            'name' => 'effluent',
                            'label' => 'Effluent flow',
                            'type' => 'number',
                            'suffix' => 'm³/day',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'effluent_tss',
                            'label' => 'Effluent suspended solids',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target SRT',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'srt',
                            'label' => 'Solids retention time',
                            'type' => 'number',
                            'suffix' => 'days',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sludge_age_mass',
                            'label' => 'Solids inventory',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'waste_needed',
                            'label' => 'Wasting rate for the target SRT',
                            'type' => 'number',
                            'suffix' => 'm³/day',
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
            'title' => 'Retention',
            'results' => ['sludge_age_mass' => 'volume*mlss/1000', 'srt' => '(volume*mlss/1000)/(waste*waste_mlss/1000+effluent*effluent_tss/1000)', 'waste_needed' => '((volume*mlss/1000)/target-effluent*effluent_tss/1000)/(waste_mlss/1000)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Solids retention time, or sludge age, is how long a bacterium stays in the system, and it decides which organisms survive there. It returns solids inventory, solids retention time and wasting rate for the target SRT, and the panel shows all of them at once.
        
        This calculator returns SRT from the tank inventory and the daily sludge wasting, plus the wasting rate needed to hit a target age.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Solids Retention Time (SRT)', 'html' => <<<'TXT'
            <p>SRT = (V × MLSS) ÷ (Q_w × MLSS_w + Q_e × TSS_e), all masses in the same units</p>
            <figure class="calc-figure"><img src="/uploads/biology/solids-retention-time.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Solids Retention Time Calculator (SRT) — Solids inventory divided by daily loss is the sludge age." title="Solids Retention Time Calculator (SRT)"><figcaption>Solids inventory divided by daily loss is the sludge age.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>V</code></td><td>aeration tank volume</td><td>m³</td></tr><tr><td><code>Q_w</code></td><td>waste sludge flow</td><td>m³/day</td></tr><tr><td><code>MLSS_w</code></td><td>wasted sludge concentration</td><td>mg/L</td></tr><tr><td><code>Q_e</code></td><td>effluent flow</td><td>m³/day</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Solids Retention Time (SRT)?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: aeration tank volume of <strong>750</strong> m³, mlss of <strong>3,000</strong> mg/L, waste sludge flow of <strong>25</strong> m³/day, waste sludge mlss of <strong>8,000</strong> mg/L, effluent flow of <strong>500</strong> m³/day, effluent suspended solids of <strong>15</strong> mg/L, target srt of <strong>15</strong> days.</p>
            <p>Substituting them into the formula gives solids inventory of <strong>2,250</strong> kg, solids retention time of <strong>10.84</strong> days, wasting rate for the target srt of <strong>17.81</strong> m³/day.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>2 – 4 days</td><td><strong>High rate</strong></td><td>fast growth, poor nitrification</td></tr><tr><td>5 – 10 days</td><td><strong>Conventional</strong></td><td>BOD removal, partial nitrification</td></tr><tr><td>10 – 20 days</td><td><strong>Nitrifying</strong></td><td>stable ammonia removal</td></tr><tr><td>above 25 days</td><td><strong>Extended aeration</strong></td><td>sludge stabilisation, low yield</td></tr></tbody></table>
            <ul><li><p>SRT, not hydraulic retention time, controls the biology: a plant can have a four-hour hydraulic pass and a fifteen-day sludge age at the same time.</p></li><li><p>Nitrifying bacteria grow slowly, so a plant designed for ammonia removal needs an SRT of at least 8–10 days at 15 °C and more when colder.</p></li><li><p>Solids lost over the weir count. On a plant with poor clarification, effluent TSS can be the dominant term in the denominator.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Quoting hydraulic retention time when asked about sludge age.</li><li>Ignoring effluent suspended solids, which quietly shorten the SRT.</li><li>Wasting from the return line without using the return concentration in the calculation.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/svi-sludge-volume-index">Sludge volume index</a>. <a href="/biology/bod-load">BOD load</a>. <a href="/biology/bacterial-growth-curve">Growth curve</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How long should sludge be kept in an activated-sludge plant?', 'a' => '5–10 days for BOD removal, 10–20 for nitrification, 25 and above for stabilisation.'],
            ['q' => 'Does SRT set sludge production?', 'a' => 'Yes — surplus sludge falls roughly as 1/SRT, which is why long ages produce less waste sludge.'],
            ['q' => 'What does the Solids Retention Time (SRT) actually calculate?', 'a' => <<<'TXT'
            It returns solids inventory, solids retention time and wasting rate for the target SRT. Each one is derived by the formula on this page, so you can check any figure by hand.
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
