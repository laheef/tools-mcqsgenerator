<?php

/**
 * Seeding Rate and Plants per Hectare Calculator
 * /biology/seeding-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Seeding Rate and Plants per Hectare Calculator',
    'meta' => ['title' => 'Seeding Rate and Plants per Hectare Calculator', 'description' => <<<'TXT'
    Seed rate depends on the target plant population, thousand-seed weight and germination: you must sow more seed than the plants you want, because some will not…
    TXT, 'h1' => 'Seeding Rate and Plants per Hectare Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'target',
                            'label' => 'Target plants',
                            'type' => 'number',
                            'suffix' => 'plants/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300000',
                        ],
                        [
                            'name' => 'tsw',
                            'label' => 'Thousand seed weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'germination',
                            'label' => 'Germination',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '92',
                        ],
                        [
                            'name' => 'establishment',
                            'label' => 'Field establishment',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Survival of germinated seedlings',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '90',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Seed rate',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_m2',
                            'label' => 'Seeds per square metre',
                            'type' => 'number',
                            'suffix' => 'seeds/m²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'row',
                            'label' => 'Seeds per metre of row',
                            'type' => 'number',
                            'suffix' => 'seeds/m',
                            'help' => 'At 25 cm row spacing',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'spacing',
                            'label' => 'Plant spacing in the row',
                            'type' => 'number',
                            'suffix' => 'cm',
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
            'title' => 'Seed rate',
            'results' => ['rate' => 'target*tsw/1000/1000/(germination/100)/(establishment/100)', 'per_m2' => 'target/10000/(germination/100)/(establishment/100)', 'row' => 'target/10000/(germination/100)/(establishment/100)*0.25', 'spacing' => '100/target/10000/(germination/100)/(establishment/100)*0.25/0.25'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Seed rate depends on the target plant population, thousand-seed weight and germination: you must sow more seed than the plants you want, because some will not establish. It returns seed rate, seeds per square metre, seeds per metre of row and plant spacing in the row, and the panel shows all of them at once.
        
        This calculator gives the seed weight per hectare and per square metre.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Seeding Rate and Plants per Hectare', 'html' => <<<'TXT'
            <p>Seed rate (kg/ha) = target plants × TSW ÷ 10⁶ ÷ germination ÷ establishment</p>
            <figure class="calc-figure"><img src="/uploads/biology/seeding-rate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Seeding Rate and Plants per Hectare Calculator — Target plants, seed weight and germination to a seed rate." title="Seeding Rate and Plants per Hectare Calculator"><figcaption>Target plants, seed weight and germination to a seed rate.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>target</code></td><td>plants wanted at harvest</td><td>plants/ha</td></tr><tr><td><code>TSW</code></td><td>thousand seed weight</td><td>g</td></tr><tr><td><code>germination</code></td><td>laboratory germination</td><td>%</td></tr><tr><td><code>establishment</code></td><td>field survival of germinated seed</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Seeding Rate and Plants per Hectare?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: target plants of <strong>300,000</strong> plants/ha, thousand seed weight of <strong>40</strong> g, germination of <strong>92</strong>%, field establishment of <strong>90</strong>%.</p>
            <p>Substituting them into the formula gives seed rate of <strong>14.49</strong> kg/ha, seeds per square metre of <strong>36.23</strong> seeds/m², seeds per metre of row of <strong>9.06</strong> seeds/m, plant spacing in the row of <strong>4.03e-08</strong> cm.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Thousand seed weight is the single most useful seed-lot measurement: it converts a plant target into kilograms without any guessing.</p></li><li><p>Germination and field establishment are separate: a lot can germinate at 95% in the laboratory and still establish at 80% in a rough seedbed.</p></li><li><p>Every doubling of target population roughly halves the plants per metre of row, which is where competition, lodging and disease pressure are decided.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Using laboratory germination as if it were field establishment.</li><li>Confusing thousand seed weight with seed weight per plant.</li><li>Calculating for the target population rather than the sown population.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I convert a seed rate to seeds per square metre?', 'a' => 'Divide the seed weight per hectare by the thousand seed weight and multiply by 1 000 ÷ 10 000.'],
            ['q' => 'Why sow more than the target?', 'a' => 'Because a proportion of seeds never germinate or never establish.'],
            ['q' => 'What does the Seeding Rate and Plants per Hectare actually calculate?', 'a' => <<<'TXT'
            It returns seed rate, seeds per square metre, seeds per metre of row and plant spacing in the row. Each one is derived by the formula on this page, so you can check any figure by hand.
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
