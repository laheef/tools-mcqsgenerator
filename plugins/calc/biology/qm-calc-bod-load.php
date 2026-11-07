<?php

/**
 * BOD Load Calculator
 * /biology/bod-load
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'BOD Load Calculator',
    'meta' => ['title' => 'BOD Load Calculator: Formula, Steps & Results', 'description' => 'BOD load is the mass of oxygen-demanding material a waste stream delivers to a treatment plant each day, and it sizes the aeration tank. Enter the values you…', 'h1' => 'BOD Load Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'flow',
                            'label' => 'Flow',
                            'type' => 'number',
                            'suffix' => 'm³/day',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'bod_in',
                            'label' => 'Influent BOD',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '320',
                        ],
                        [
                            'name' => 'bod_out',
                            'label' => 'Effluent BOD',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
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
                            'name' => 'load',
                            'label' => 'BOD load',
                            'type' => 'number',
                            'suffix' => 'kg/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'removed',
                            'label' => 'BOD removed',
                            'type' => 'number',
                            'suffix' => 'kg/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pe',
                            'label' => 'Population equivalent',
                            'type' => 'number',
                            'suffix' => 'people',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'f_m',
                            'label' => 'Food to microorganism ratio',
                            'type' => 'number',
                            'suffix' => 'kg/kg/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'efficiency',
                            'label' => 'Removal efficiency',
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
            'title' => 'Load',
            'results' => [
                'load' => 'flow*bod_in/1000',
                'removed' => 'flow*(bod_in-bod_out)/1000',
                'pe' => 'flow*bod_in/1000/0.06',
                'f_m' => 'flow*bod_in/1000/(volume*mlss/1000)',
                'efficiency' => '(bod_in-bod_out)/bod_in*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        BOD load is the mass of oxygen-demanding material a waste stream delivers to a treatment plant each day, and it sizes the aeration tank. It returns BOD load, BOD removed, population equivalent and food to microorganism ratio, and the panel shows all of them at once.
        
        This calculator converts flow and BOD concentration into kilograms per day, population equivalents and the effluent surcharge band.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the BOD Load', 'html' => <<<'TXT'
            <p>BOD load (kg/day) = flow (m³/day) × BOD (mg/L) ÷ 1 000; F/M = BOD load ÷ (tank volume × MLSS)</p>
            <figure class="calc-figure"><img src="/uploads/biology/bod-load.svg" width="720" height="300" loading="lazy" alt="Animated diagram: BOD Load Calculator — Load in, load out: the gap is what the biology removed." title="BOD Load Calculator"><figcaption>Load in, load out: the gap is what the biology removed.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>Q</code></td><td>flow</td><td>m³/day</td></tr><tr><td><code>BOD</code></td><td>5-day biochemical oxygen demand</td><td>mg/L</td></tr><tr><td><code>MLSS</code></td><td>mixed liquor suspended solids</td><td>mg/L</td></tr><tr><td><code>F/M</code></td><td>food to microorganism ratio</td><td>kg/kg/day</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the BOD Load?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: flow of <strong>500</strong> m³/day, influent bod of <strong>320</strong> mg/L, effluent bod of <strong>20</strong> mg/L, aeration tank volume of <strong>750</strong> m³, mlss of <strong>3,000</strong> mg/L.</p>
            <p>Substituting them into the formula gives bod load of <strong>160</strong> kg/day, bod removed of <strong>150</strong> kg/day, population equivalent of <strong>2,666.67</strong> people, food to microorganism ratio of <strong>0.0711</strong> kg/kg/day, removal efficiency of <strong>93.75</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0.05 – 0.15</td><td><strong>Extended aeration</strong></td><td>long sludge age, low surplus sludge</td></tr><tr><td>0.2 – 0.4</td><td><strong>Conventional</strong></td><td>the classic activated-sludge window</td></tr><tr><td>0.4 – 0.6</td><td><strong>High rate</strong></td><td>fast, but sludge quality suffers</td></tr><tr><td>above 1.0</td><td><strong>Overloaded</strong></td><td>poor settling, carry-over and odour</td></tr></tbody></table>
            <ul><li><p>Population equivalent assumes 60 g of BOD per person per day, which is a European convention; check the local figure before quoting it in a permit application.</p></li><li><p>BOD is a five-day test, so the number always lags the plant by a week. COD is the fast proxy, and the BOD/COD ratio tells you how biodegradable the stream is.</p></li><li><p>F/M ratio, not load alone, decides whether the sludge settles. Two plants with the same load behave completely differently if one has triple the tank volume.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Mixing units: mg/L with L/s needs a factor of 86.4 to reach kg/day.</li><li>Using the influent BOD where the permit limit is on the effluent.</li><li>Treating BOD load as constant when the plant sees a diurnal peak two to three times the daily mean.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I convert mg/L and m³/day to kg/day?', 'a' => 'Multiply flow by concentration and divide by 1 000.'],
            ['q' => 'What population does 1 000 kg BOD/day serve?', 'a' => 'About 16 700 people at 60 g per person per day.'],
            ['q' => 'What does the BOD Load actually calculate?', 'a' => <<<'TXT'
            It returns BOD load, BOD removed, population equivalent and food to microorganism ratio. Each one is derived by the formula on this page, so you can check any figure by hand.
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
